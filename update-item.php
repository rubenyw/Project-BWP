<?php
    require('action.php');

    $update = $_SESSION['update'];
    

    if(isset($_POST['btn-update'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $series = $_POST['series'];
        $desc = $_POST['desc'];
        $id = $update['af_id'];
        if($name == "" || $price == "" || $stock == "" || $series == "" || $desc == ""){
            $error = "Ada field yang kosong!";
            
        }else if (!is_numeric($price) || !is_numeric($stock)){
            $error = "Field angka harus diisi angka!";
        }else{
            if(!empty($_FILES["image"]["name"])){
                $exp = explode(".",$_FILES["image"]["name"]);
                $file = "assets/GambarFigure/". $id['ID'] . "." . end($exp);
                move_uploaded_file($_FILES["image"]["tmp_name"], $file);
            }else{
                $file = "";
            }
            $query = "UPDATE actionfigure SET af_name = '$name', af_price = '$price', af_stock = '$stock', af_se_id = '$series', af_desc = '$desc', af_image_path = '$file' where af_id = '$id'";    
            $query = mysqli_query($con, $query);
            $success = "Update Success!";
            unset($_SESSION['update']);
            header('Location: admin-item.php');
        }
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
        <nav class="my-nav navbar navbar-expand-lg p-3 position-sticky top-0 w-100 shadow navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="admin.php">Tokosidia</a>
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
                    <div class="col-lg-7 border bg-light">
                        <div class="my-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-floating mt-2">
                                    <input type="text" class="form-control bg-light form" id="floatingInput" name="name" placeholder=" " value="<?=$update['af_name']?>">
                                    <label for="floatingInput" class="fw-bold">Name</label>
                                </div>  
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control bg-light form" id="priceID" name="price" placeholder=" " value="<?=$update['af_price']?>">
                                    <label for="priceID" class="fw-bold">Price</label>
                                </div>  
                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control bg-light form" id="stockID" name="stock" placeholder=" " value="<?=$update['af_stock']?>">
                                    <label for="stockID" class="fw-bold">Stock</label>
                                </div> 
                                <div class="input-group mt-3">
                                    <select class="form-select bg-light fw-bold form" style="height: 55px;" name='series'>
                                        <option class="fw-bold" value="" hidden>Series</option>
                                        <?php
                                            $query = "SELECT se_name as 'Name', se_id as 'ID' from series";
                                            $query = mysqli_query($con, $query);
                                            while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                                        ?>

                                        <option value='<?=$row['ID']?>' <?=($row['ID'] == $update['af_se_id']? 'selected' : '')?>><?=$row['Name']?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-5 mt-3">
                                    <textarea class="form-control bg-light form" id="txt" placeholder=" " style="height: 300px;" name="desc"><?=$update['af_desc']?></textarea>
                                    <label for="txt" class="fw-bold">Deskripsi</label>
                                </div>  
                                <div class="row align-items-center my-3">
                                    <div class="col-3">
                                        Add Picture
                                    </div>
                                    <div class="col">
                                        <input type="file" id="files" name="image" style="display:none;" accept="image/*">
                                        <label class="btn btn-secondary" for="files">Choose File</label>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-green btn-small px-5" type="submit" name="btn-update">update</button>
                                <div class="text-success fw-bold text-center">
                                    <?php
                                    if (isset($success)) {
                                        if (strlen($success) > 0) {
                                            echo $success;
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="text-danger fw-bold text-center">
                                    <?php
                                    if (isset($error)) {
                                        if (strlen($error) > 0) {
                                            echo $error;
                                        }
                                    }
                                    ?>
                                </div>
                            </form>
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
            
                formControl = $(".form");
                $(formControl).blur(function(){
                    if($(this).val() == ""){
                        $(this).addClass("is-invalid");
                        $(this).removeClass("is-valid");
                    }else{
                        $(this).addClass("is-valid");
                        $(this).removeClass("is-invalid");
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