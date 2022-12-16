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
        <title>Website</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="assets/css/general.css" rel="stylesheet">
    </head>
    <body>
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
                    <div class="row justify-content-center">
                        <div class="col-8 me-5 border">

                            <?php
                            
                            $query = "SELECT * from cart where ca_us_id = '".$_SESSION['userLogin']['id']."' and ca_status = 'Requested'";
                            $query = mysqli_query($con, $query);
                            if(mysqli_num_rows($query) > 0){
                            ?>

                            <!-- Content -->

                            <?php

                            }else{

                            ?>
                            <div class="row align-items-center text-center" style="height: 200px;">
                                <div class="col">
                                    <div class="h2">Belum ada Barang nih</div>
                                    <a class="text-danger" href="index.php">Belanja yuk</a>
                                </div>
                            </div>
                            <?php

                            }

                            ?>

                        </div>
                        <div class="col-3 border text-center justify-content-center py-4">
                        <?php   
                            
                            $query = "SELECT (SUM(a.af_price)) AS 'Total' FROM actionfigure a JOIN cart c ON c.ca_af_id = af_id JOIN users u ON u.us_id = c.ca_us_id and u.us_id = '".$_SESSION['userLogin']['id']."'";
                            $query = $con -> query($query);
                            $row = $query -> fetch_array(MYSQLI_ASSOC);
                            if($row['Total'] != null){
                                $price = $row['Total'];   
                            ?>
                            
                            <!-- Content -->
                            <div class="h5 mb-3" style="color: gray;">TOTAL PRICE</div>
                            <div class="h3 mb-3" style="color: red;">IDR <?=$price?></div>
                            <button class="btn btn-success w-100">CHECKOUT</button>

                            <?php

                            }else{

                            ?>

                            <div class="h5 mb-3" style="color: gray;">TOTAL PRICE</div>
                            <div class="h3 mb-3" style="color: red;">IDR 0</div>
                            <button class="btn btn-secondary w-100 disable" disable>CHECKOUT</button>

                            <?php

                            }

                            ?>
                            
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0 align-items-center justify-content-center">
                                            <thead>
                                            <tr>
                                                <th scope="col">No </th>
                                                <th scope="col">Nama Action Figure</th>
                                                <th scope="col">Seri</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Stok</th>
                                                <!-- <th scope="col">Jenis</th>
                                                <th scope="col">Deadline</th>
                                                <th scope="col">Action</th> -->
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <!-- <td></td>
                                                    <td></td> -->
                                                    <td class="d-grid gap-2">
                                                        <!-- <form action='' method='post'> -->
                                                            <input type='hidden' name='apply' value=''>
                                                            <button name='btn-apply' class='btn btn-outline-success btn-sm px-4'>Apply</button>
                                                        <!-- </form> -->
                                                    </td>
                                                </tr>
                                              
                                            
                                            </tbody>
                                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Core theme JS-->
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
