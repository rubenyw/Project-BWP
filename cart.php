<?php
    require('action.php');
    
    $cart = "";
    if(isset($_SESSION['userLogin'])){
        $select_query = "SELECT count(*) as 'cart' FROM cart where ca_us_id = '".$_SESSION['userLogin']['id']."' and ca_status = 'Requested'";
        $cart = $con->query($select_query);
        $cart = $cart->fetch_assoc();
        $cart = $cart['cart'];
    }
    // Buat masuk ke page login
    if(isset($_POST['login'])){
        header('Location: login.php');
    }

    // Buat masuk ke page register
    if(isset($_POST['register'])){
        header('Location: register.php');
    }

    // Buat masuk cart
    if(isset($_POST['cart'])){
        if(isset($_SESSION['userLogin'])){
            header('Location: cart.php');
        }else{
            header('Location: login.php');
        }
    }
    if(isset($_POST['remove'])){
        $id_figure = $_POST['id_figure'];
        $id_user = $_SESSION['userLogin']['id'];
        $query = "DELETE from cart where ca_us_id = '$id_user' and ca_af_id = '$id_figure'";
        $query = mysqli_query($con, $query);
    }

    if(isset($_POST['checkout'])){
        $select = "SELECT * from cart where ca_us_id = '".$_SESSION['userLogin']['id']."'";
        $htrans = "SELECT concat('HB', LPAD(ifnull(MAX(substr(hb_id,3,3))+1,1), 3, 0)) as 'id_htrans' from htrans_beli";
        $htrans = mysqli_query($con, $htrans);
        $htrans = mysqli_fetch_array($htrans, MYSQLI_ASSOC)['id_htrans'];

        $id = $_SESSION['userLogin']['id'];
        $total = "SELECT (SUM(b.subtotal)) AS 'Total' FROM actionfigure a JOIN cart c ON c.ca_af_id = af_id JOIN (select a.af_price * c.ca_qty as 'subtotal' from cart c join actionfigure a on c.ca_af_id = a.af_id where c.ca_us_id = '$id') b JOIN users u ON u.us_id = c.ca_us_id and u.us_id = '".$_SESSION['userLogin']['id']."'";
        $total = $con -> query($total);
        $total = $total -> fetch_array(MYSQLI_ASSOC)['Total'];

        $insert = "INSERT into htrans_beli values('$htrans', NOW(), $total, '".$_SESSION['userLogin']['id']."', null)";
        $insert = mysqli_query($con, $insert);

        while($row = mysqli_fetch_array(mysqli_query($con, $select), MYSQLI_ASSOC)){
            $id_dtrans = mysqli_query($con, "SELECT concat('DB', LPAD(ifnull(MAX(substr(db_id,3,3))+1,1), 3, 0)) as 'id_htrans' from dtrans_beli");
            $id_dtrans = mysqli_fetch_array($id_dtrans, MYSQLI_ASSOC)['id_htrans'];
            $qty = $row['ca_qty'];

            $subtotal = "SELECT (a.af_price * c.ca_qty) as 'subtotal' from actionfigure a join cart c where c.ca_af_id = a.af_id and a.af_id = '".$row['ca_af_id']."'";
            $subtotal = mysqli_fetch_array(mysqli_query($con, $subtotal))['subtotal'];
            
            $id_figure = $row['ca_af_id'];

            $insert = "INSERT into dtrans_beli values('$id_dtrans', $qty, '$htrans', $subtotal, '$id_figure')";
          
            
            $insert = mysqli_query($con, $insert);

            $delete = "DELETE from cart where ca_us_id = '".$_SESSION['userLogin']['id']."'";
            $delete = mysqli_query($con, $delete);
        }


    }

    // Buat logout, sessionnya di hapus biar hilang datanya
    if(isset($_POST['logout'])){
        unset($_SESSION['userLogin']);
        $cart = "";
        // Balikin ke Home
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cart</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="assets/css/general.css" rel="stylesheet">
    </head>
    <body onload="load_ajax()">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg p-3 position-sticky top-0 w-100 shadow navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php" style="font-size: 22pt; font-weight: bold;">Tokosidia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
               
                <ul class="navbar-nav ms-auto mb-2 me-3 mb-lg-0 px-3 border-end">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">
                                <button class="btn btn-sm text-light">Home</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="request.php">
                                <button class="btn btn-sm text-light">Transaction</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="nav-link" action="" method="post">
                                <button class="btn btn-light btn-sm px-3 fw-bold" type="submit" name='cart'>
                                    <i class="bi-cart-fill me-1"></i>Cart
                                    <span class="badge bg-dark text-light ms-1 rounded-pill"><?=$cart?></span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="" method="post">
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="profile">
                                <i class="bi bi-person-circle fill me-1"></i>Hello, <?=$_SESSION['userLogin']['username']?>
                            </button>
                            <button class="btn btn-danger btn-sm px-3 fw-bold" name="logout">
                                Logout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <section class="intro py-5 border-bottom bg-light" id="features">
            <div class="mask d-flex h-100">
                <div class="container bg-white py-3 px-3">
                    <h2 class='mb-5'>Shopping Cart</h2>
                    <div class="row justify-content-center d-flex" id='list_cart'>
                        
                        
                    </div>
                </div>
            </div>
            
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Core theme JS-->
        <script>
            let list_cart;

            function load_ajax(){
                list_cart = document.getElementById('list_cart');
                fetch_items();
            }

            function fetch_items(){
                // 1. Inisialisai buat object dulu
                r = new XMLHttpRequest();
                // 2. Callback Function apa yang akan dikerjakan
                // NB: Jangan menggunakan Arrow Function () => {} di sini
                //     karena akan return undefined dan null
                r.onreadystatechange = function() {
                    // Kalau dapat data dan status selesai > Lakukan sesuatu
                    if ((this.readyState==4) && (this.status==200)) {
                        list_cart.innerHTML = this.responseText;
                    }
                }
                
                // 3. Memanggil dan mengeksekusi AJAX
                r.open('GET', 'cart_fetch.php');
                r.send();
            }

            function update_item(id_figure, index){
                r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if ((this.readyState==4) && (this.status==200)) {
                        fetch_items();
                    }
                }
                console.log(index);
                var params = {
                    "id_figure":id_figure,
                    "qty":document.getElementById("qty_"+index).value
                };

                r.open('POST', `cart_update.php`);
                r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                r.send(`params=${JSON.stringify(params)}`);
            }
        </script>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script>
            $(function(){
                let button = $("[name='btn-apply']");
                $(button).click(function(){
                    if($(this).text() == "Apply"){
                        $(this).text("Pending")
                        $(this).removeClass("btn-outline-success");
                        $(this).addClass("btn-outline-danger");
                    }else{
                        $(this).text("Apply");
                        $(this).removeClass("btn-outline-danger");
                        $(this).addClass("btn-outline-success");
                    }
                })
                // let lokasi = $("#lokasi");
                // let jabatan = $("#jabatan");
                // let jenis = $("#jenis");
                // let sort = $("#sort");
                // let asc = $("#asc");
                // $(lokasi).change(function(){
                    //     $('#btn-filter').click();
                    // })
                    // $(jabatan).change(function(){
                        //     $('#btn-filter').click();
                        // })
                        // $(jenis).change(function(){
                            //     $('#btn-filter').click();
                            // })
                            // $(sort).change(function(){
                                //     $('#btn-filter').click();
                                // })
                                // $(asc).change(function(){
                                    //     $('#btn-filter').click();
                                    // })
                                })
                                
                                </script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
