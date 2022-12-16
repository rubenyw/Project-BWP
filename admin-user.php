<?php
    require('action.php');
    
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
        <nav class="my-nav navbar navbar-expand-lg p-3 position-sticky top-0 w-100 shadow navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="admin.php" style="font-size: 22pt; font-weight: bold;">Tokosidia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 px-3 border-end">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="admin.php">
                                <button class="btn btn-sm text-light">Transaction</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-item.php">
                                <button class="btn btn-sm text-light">Items</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <button class="btn btn-sm text-light fw-bold">Users</button>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a class="" href="index.php">
                            <button class="btn btn-danger btn-sm px-3 fw-bold" name="logout">Logout</button>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Welcome Admin!</h1>
                            <p class="lead text-white-50 mb-4">Ingin beli action figure murah dan terpercaya? Tokosidia jawabannya</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="intro py-5 border-bottom bg-light" id="features">
            <div class="mask d-flex align-items-center h-100">
                <div class="container text-center">
                    <h2>List User</h2>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-border mb-0 align-items-center justify-content-center text-start">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <?php
                                                    $query = "SELECT * from users";
                                                    $query = mysqli_query($con, $query);
                                                    $counter = 1;
                                                    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                                ?>
                                                <tr>
                                                    <td class='col-1'><?=$counter?></td>
                                                    <td class='col-2'><?=$row['us_id']?></td>
                                                    <td class='col-2'><?=$row['us_username']?></td>
                                                    <td class='col-2'><?=$row['us_email']?></td>
                                                    <td class='col-2'><?=$row['us_password']?></td>
                                                    <td class='col-2'><?=($row['us_gender'] == 1? 'Laki-Laki' : 'Perempuan')?></td>
                                                    <td class='col-1'>
                                                        <input type='hidden' name='apply' value=''>
                                                        <button name='btn-apply' class='btn btn-outline-success btn-sm px-4'>Apply</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                        $counter++;
                                                    }
                                                ?>
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
    </body>
</html>
