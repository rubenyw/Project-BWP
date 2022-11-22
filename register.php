<?php
    require('action.php');
    $success = "";
    if(isset($_POST['btn-register'])){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirmp = $_POST['confirmp'];
        $hobi = $_POST['hobi'];
        $error = "";
        if($username == "" || $fullname == "" || $password == "" || $confirmp == "" || $hobi == ""){
            $error = "Ada FIELD KOSONG!";
        }else if ($password != $confirmp){
            $error = "Password dan Confirm Password Tidak sesuai!";
        }
        else{
            $sql_u = "SELECT * FROM users WHERE username='$username'";
            $res_u = mysqli_query($con, $sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                $error = "Maaf... username telah digunakan"; 	
            }else{
                $id = (mysqli_query($con, "SELECT concat('US', lpad(ifnull(max(substr(id,3,3))+1, 1), 3, 0)) as 'ID' from users"));
                $row = mysqli_fetch_array($id);
                $id = $row['ID'];
                $gender = ($gender == "male"? 1 : 0);
                $result = mysqli_query($con, "insert into users values('$id', '$username', '$fullname', '$gender', '$hobi', '$password')");
                $success = "Berhasil Registrasi";
            }
                    
        }
    }
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/general.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-light">
        <nav class="navbar bg-white">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/Logo.png" width="150">
                </a>
                <ul class="nav justify-content-end fw-bold">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid bg-light" style="height: 800px;">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-4 bg-white border py-5 px-5" action='' method='post'>
                    <h2>Register</h2>
                    <div class="form-floating mb-3 mt-5">
                        <input type="text" class="form-control bg-light" id="floatingInput" name="username" placeholder=" ">
                        <label for="floatingInput" class="fw-bold">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-light" id="floatingFull" name="fullname" placeholder=" ">
                        <label for="floatingFull" class="fw-bold">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control bg-light" id="floatingTel" name="telephone" placeholder=" ">
                        <label for="floatingTel" class="fw-bold">No. Telp</label>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select bg-light fw-bold" style="height: 55px;" name="gender" id="floatingGender">
                            <option class="fw-bold" value="" hidden>Gender</option>
                            <option class="fw-bold" value="male">Male</option>
                            <option class="fw-bold" value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-light" id="floatingHobi" name="hobi" placeholder=" ">
                        <label for="floatingHobi" class="fw-bold">Hobi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control bg-light" id="floatingPassword" name="password" placeholder=" ">
                        <label for="floatingPassword" class="fw-bold">Password</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control bg-light" id="floatingConfirm" name="confirmp" placeholder=" ">
                        <label for="floatingConfirm" class="fw-bold">Confirm Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-danger   " type="submit" name='btn-register'>Register</button>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            Have an Account? <a href="login.php">Login</a>
                        </div>
                    </div>
                    <div class="success text-center">
                        <?php
                        if (isset($success)) {
                            if (strlen($success) > 0) {
                                echo $success;
                            }
                        }
                        ?>
                    </div>
                    <div class="error text-center">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        window.onload = (event) => {
            formControl = document.querySelectorAll(".form-control");
            formSelect = document.getElementById("floatingGender");
            for (let i = 0; i < formControl.length; i++) {
                formControl[i].onblur = function(){
                    if(formControl[i].value.length == 0){
                        formControl[i].classList.add("is-invalid");
                        formControl[i].classList.remove("is-valid");
                    }else{
                        formControl[i].classList.remove("is-invalid");
                        formControl[i].classList.add("is-valid");
                    }
                }
            }
            formSelect.onblur = function(){
                if(formSelect.value.length == 0){
                    formSelect.classList.add("is-invalid");
                    formSelect.classList.remove("is-valid");
                }else{
                    formSelect.classList.remove("is-invalid");
                    formSelect.classList.add("is-valid");
                }
            }
        };
    </script>
</body>
</html>