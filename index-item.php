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

    if(isset($_GET['figure'])){
        $figure = $_GET['figure'];
        $query = "SELECT a.af_name as 'Name', a.af_price as 'Price', a.af_stock as 'Stock', s.se_name as 'Series', a.af_desc as 'Desc', a.af_image_path as 'Image' from actionfigure a join series s on s.se_id = a.af_se_id where a.af_id = $figure";
        $query = mysqli_query($con, $query);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
    }

    //Buat masuk Transaction
    if(isset($_POST['transaction'])){
        if(isset($_SESSION['userLogin'])){
            header('Location: request.php');
        }else{
            header('Location: login.php');
        }
    }

    // Buat masuk cart
    if(isset($_POST['cart'])){
        if(isset($_SESSION['userLogin'])){
            header('Location: cart.php');
        }else{
            header('Location: login.php');
        }
    }

    // Buat logout, sessionnya di hapus biar hilang datanya
    if(isset($_POST['logout'])){
        unset($_SESSION['userLogin']);
        $cart = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tokosidia</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="assets/css/general.css" rel="stylesheet">
        <link href="assets/css/product.css" rel="stylesheet">
        
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="my-nav navbar navbar-expand-lg p-3 position-sticky top-0 w-100 shadow navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php" style="font-size: 22pt; font-weight: bold;">Tokosidia</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 me-3 mb-lg-0 px-3 border-end">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">
                                <button class="btn btn-sm text-light fw-bold">Home</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="request.php">
                                <button class="btn btn-sm text-light" type='submit' name='transaction'>Transaction</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <button class="btn btn-outline-light btn-sm px-3 fw-bold" type="submit" name='cart'>
                                    <i class="bi-cart-fill me-1"></i>Cart<span class="badge bg-dark text-light ms-1 rounded-pill"><?=$cart?></span>
                                </button>
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="index.php" method="post">
                        <!-- Kalau sudah Login yang muncul ini -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="profile"><i class="bi bi-person-circle fill me-1"></i>Hello, <?=$_SESSION['userLogin']['username']?></button>
                            <button class="btn btn-danger btn-sm px-3 fw-bold" name="logout">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark">
            <div class="container px-5">
                <div class="row justify-content-center bg-dark pt-5">
                    <div class="col-3 text-center">
                        <img src="<?=$result['Image']?>" alt="">
                    </div>
                    <div class="col-8 text-white offset-1">
                        <div class="row mb-3">
                            <div class="h1"><?=$result['Name']?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="h3">IDR <?=number_format(intval($result['Price']),0,".")?></div>
                        </div>
                        <form action="">
                            <div class="row mb-3">
                                <div class="col-1">
                                    <div class="h5 mt-1">QTY</div>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="number" name="" id="" step="1" min="1" value="1">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <button class="btn btn-outline-primary">Add to Cart</button>
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="h5">Description</div>
                            <p><?=$result['Desc']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script>
            
        </script>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script>
            $(function(){
                let filterseries = $("#series");

                $(filterseries).change(function(){
                    
                })

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
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="script.js"></script>
    </body>
</html>
