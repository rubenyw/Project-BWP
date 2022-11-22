<?php
    require('action.php');
    
    // Test Akun kalau ada misalnya
    $_SESSION['userLogin']['fullname'] = 'Rubenyw';

    // Buat masuk ke page login
    if(isset($_POST['login'])){
        header('Location: login.php');
    }

    // Buat masuk ke page register
    if(isset($_POST['register'])){
        header('Location: register.php');
    }

    // Buat logout, sessionnya di hapus biar hilang datanya
    if(isset($_POST['logout'])){
        unset($_SESSION['userLogin']);
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
                <a class="navbar-brand" href="">Job Finder</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 me-3 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="user_request.php">Request</a></li>
                        <li class="nav-item"></li>
                    </ul>
                    <form class="d-flex" role="search" action="" method="post">
                        <?php
                        if(!isset($_SESSION['userLogin'])){
                        ?>
                        <!-- Kalau belum login yang muncul ini -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="login">
                                LOGIN
                            </button>
                            <button class="btn btn-outline-light btn-sm px-3 fw-bold" name="register">
                                SIGN UP
                            </button>
                        </div>
                        <?php
                        }else{
                        ?>
                        <!-- Kalau sudah Login yang muncul ini -->
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-dark btn-sm px-3 fw-bold" name="profile">
                                <i class="bi bi-person-circle fill me-1"></i> <?=$_SESSION['userLogin']['fullname']?>
                            </button>
                            <button class="btn btn-outline-light btn-sm px-3 fw-bold" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-light ms-1 rounded-pill">4</span>
                            </button>
                            <button class="btn btn-danger btn-sm px-3 fw-bold" name="logout">
                                Logout
                            </button>
                        </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Website Lowongan Pekerjaan Terpercaya</h1>
                            <p class="lead text-white-50 mb-4">Pengangguran Banyak Acara? Jangan Risau, kini Job Finder hadir untuk membantu anda yang pengangguran</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <!-- <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="intro py-5 border-bottom bg-light" id="features">
            <div class="mask d-flex align-items-center h-100">
                <div class="container text-center">
                    <h2>Lowongan Pekerjaan</h2>
                    <div class="row justify-content-center">
                        <form action="" method="post">
                            <div class="input-group">
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='lokasi' id='lokasi'>
                                        <option value=''>All</option>
                                    </select>
                                    <label for="lokasi">Lokasi</label>
                                </div>
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='jabatan' id='jabatan'>
                                        <option value=''>All</option>
                                    </select>
                                    <label for="jabatan">Jabatan</label>
                                </div>
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='jenis' id='jenis'>
                                    <option value=''>All</option>
                                    </select>
                                    <label for="jenis">Jenis</label>
                                </div>
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='sort' id='sort'>
                                    <option value=''>All</option>
                                    </select>
                                    <label for="sort">Sort</label>
                                </div>
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='asc' id='asc'>
                                        <option value=''>All</option>
                                    </select>
                                    <label for="asc">Sort</label>
                                </div>
                                <button hidden type='submit' id='btn-filter'>haha</button>
                            </div>
                        </form>
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
                                                <th scope="col">Company</th>
                                                <th scope="col">Pekerjaan</th>
                                                <th scope="col">Lokasi</th>
                                                <th scope="col">Jabatan</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">Deadline</th>
                                                <th scope="col">Action</th>
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
                                                    <td></td>
                                                    <td></td>
                                                    <td class="d-grid gap-2">
                                                        <!-- <form action='' method='post'> -->
                                                            <input type='hidden' name='apply' value=''>
                                                            <button name='btn-apply' class='btn btn-outline-success btn-sm px-4'>
                                                                Apply
                                                            </button>
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
                let lokasi = $("#lokasi");
                let jabatan = $("#jabatan");
                let jenis = $("#jenis");
                let sort = $("#sort");
                let asc = $("#asc");
                $(lokasi).change(function(){
                    $('#btn-filter').click();
                })
                $(jabatan).change(function(){
                    $('#btn-filter').click();
                })
                $(jenis).change(function(){
                    $('#btn-filter').click();
                })
                $(sort).change(function(){
                    $('#btn-filter').click();
                })
                $(asc).change(function(){
                    $('#btn-filter').click();
                })
                })

        </script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
