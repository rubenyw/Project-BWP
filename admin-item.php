<?php
    require('action.php');

    $filter_series = "";
    
    if(isset($_POST['btn-update-item'])){
        $id = $_POST['id_item'];
        $query = "SELECT * from actionfigure where af_id = '$id'";
        $query = mysqli_fetch_array(mysqli_query($con, $query), MYSQLI_ASSOC);
        $_SESSION['update'] = [
            'af_id'=> $query['af_id'],
            'af_name'=> $query['af_name'],
            'af_price'=> $query['af_price'],
            'af_stock'=> $query['af_stock'],
            'af_status'=> $query['af_status'],
            'af_se_id'=> $query['af_se_id'],
            'af_desc'=> $query['af_desc'],
            'af_image_path'=> $query['af_image_path']
        ];
        header('Location: update-item.php');
    }

    if(isset($_POST['filter'])){
        $filter_series = $_POST['lokasi'];
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
    <body onload='load_ajax()'>
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
                            <a class="nav-link" href="">
                                <button class="btn btn-sm text-light fw-bold">Items</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-user.php">
                                <button class="btn btn-sm text-light">Users</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="intro py-5 border-bottom bg-light" id="features">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class='h2 mb-5'>List Item</div>
                    <a href="add-item.php"><button class="btn btn-outline-success w-25 mb-5">Add Item</button></a>
                    <div class="row justify-content-center">
                        <form action="" method="post">
                            <div class="input-group">
                                <div class="form-floating mb-3 mx-5">
                                    <select class="form-select" name='lokasi' id='lokasi'>
                                        <option value=''>All</option>
                                        <?php
                                            
                                            $select_query = "SELECT * from series";
                                            $select_query = mysqli_query($con, $select_query);
                                            while($row = mysqli_fetch_array($select_query, MYSQLI_ASSOC)){
                                            ?>

                                            <option value='<?=$row['se_id']?>' <?=($row['se_id'] == $filter_series? "selected='selected'" : "") ?>><?=$row['se_name']?></option>

                                            <?php
                                            }

                                        ?>  
                                    </select>
                                    <label for="lokasi">Series</label>
                                </div>
                                <button hidden type='submit' name="filter" id='btn-filter'>haha</button>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    
                                    <div class="table-responsive">
                                    <table class="table table-border mb-0 align-items-center justify-content-center text-center">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Series</th>
                                                <th scope="col">Update</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody id='listItem'>
                                                
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
        <script>
            let list_item;

            function load_ajax(){
                list_item = document.getElementById('listItem');

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
                        list_item.innerHTML = this.responseText;
                    }
                }
                
                // 3. Memanggil dan mengeksekusi AJAX
                r.open('GET', 'item_fetch.php'+'<?=$filter_series==''?'':'?series='.$filter_series?>');
                r.send();
            }

            function update_item(obj){;

                update_id = obj.value;
                r = new XMLHttpRequest();
                r.onreadystatechange = function() {
                    if ((this.readyState==4) && (this.status==200)) {
                        fetch_items();
                    }
                }
                
                r.open('POST', `item_update.php`);
                r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                r.send(`update_id=${update_id}`);
            }
        </script>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script>
            $(function(){

                let filterseries = $("#lokasi");

                $(filterseries).change(function(){
                    $("#btn-filter").click();
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
    </body>
</html>
