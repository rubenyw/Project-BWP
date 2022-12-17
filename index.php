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
                            <a class="nav-link" aria-current="page" href="">
                                <button class="btn btn-sm text-light fw-bold">Home</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="nav-link" action="" method="post">
                                <button class="btn btn-sm text-light" type='submit' name='transaction'>Transaction</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <form class="nav-link" action="" method="post">
                                <button class="btn btn-outline-light btn-sm px-3 fw-bold" type="submit" name='cart'>
                                    <i class="bi-cart-fill me-1"></i>Cart<span class="badge bg-dark text-light ms-1 rounded-pill"><?=$cart?></span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="" method="post">
                        <?php
                            if(!isset($_SESSION['userLogin'])){
                        ?>
                        <!-- Kalau belum login yang muncul ini -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="login">Login</button>
                            <button class="btn btn-outline-light btn-sm px-3 fw-bold" name="register">Sign Up</button>
                        </div>
                        <?php
                            }else{
                        ?>
                        <!-- Kalau sudah Login yang muncul ini -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="profile"><i class="bi bi-person-circle fill me-1"></i>Hello, <?=$_SESSION['userLogin']['username']?></button>
                            <button class="btn btn-danger btn-sm px-3 fw-bold" name="logout">Logout</button>
                        </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <h3 class="display-6 fw-bolder text-white my-5">Website Jual Beli Action Figure</h3>
                            <div id="carouselExampleDark" class="carousel slide carousel-fade my-carousel" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                <?php
                                $counter = 0;
                                while($counter < 12){
                                ?>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?=$counter?>" <?=($counter == 0? 'class="active" aria-current="true"' : '')?>  aria-label="Slide <?=($counter+1)?>"></button>
                                <?php
                                    $counter++;
                                }
                                ?>

                                </div>
                                <div class="carousel-inner rounded-5 shadow-4-strong">
                                    <?php
                                    $counter = 0;
                                    while($counter < 12){
                                    ?>
                                    <div class="carousel-item <?=($counter == 0? 'active' : '')?>" data-bs-interval="2000">
                                    <img src="assets/Gambar/<?=($counter+1)?>.jpg" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block text-light fw-bold">
                                        <!-- <h5>Website Jual Beli Action Figure</h5> -->
                                        <p>&nbsp</p>
                                    </div>
                                    </div>

                                    <?php
                                        $counter++;
                                    }
                                    ?>
                                   
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            
                            <p class="lead text-white-50 mt-4">Ingin beli action figure murah dan terpercaya? Tokosidia jawabannya</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php
            for($i = 0; $i < 100; $i++){
                echo "<br>";
            }
        ?>
        <!-- product section -->

        <!-- <div class="product"> 
        <h2 class="product-category">best selling</h2>
        <button class="pre-btn"><img src="assets/icon/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="assets/icon/arrow.png" alt=""></button>
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (2).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (3).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (4).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (5).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (6).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (7).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (8).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (9).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">50% off</span>
                    <img src="assets/GambarFigure/card (10).jpg" class="product-thumb" alt="">
                    <button class="card-btn">add to wishlist</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">brand</h2>
                    <p class="product-short-description">a short line about the cloth..</p>
                    <span class="price">$20</span><span class="actual-price">$40</span>
                </div>
            </div>
        </div>
        </div> -->

        <!-- Features section-->
        <section class="intro py-5 border-bottom bg-light" id="features">
            <div class="mask d-flex align-items-center h-100">
                <div class="container text-center">
                    <h2>Action Figures</h2>
                    <div class="row justify-content-center">
                        <form action="" method="post">
                            <div class="input-group">
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='lokasi' id='lokasi'>
                                        <option value=''>All</option>
                                    </select>
                                    <label for="lokasi">Series</label>
                                </div>
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='jenis' id='jenis'>
                                    <option value=''>All</option>
                                    </select>
                                    <label for="jenis">Harga</label>
                                </div>
                                <button hidden type='submit' id='btn-filter'>haha</button>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row">
                                
                            </div>
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                        <div class="container text-center">
                                            <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-3 border bg-light">
                                                        <img src="assets/GambarFigure/card (1).jpg" class="product-thumb" alt="">
                                                        test
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="script.js"></script>
    </body>
</html>
