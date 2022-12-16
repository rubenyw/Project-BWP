<?php
    require('action.php');
    $success = "";
    if(isset($_POST['btn-register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirmp = $_POST['confirmp'];
        $error = "";
        if($username == "" || $email == "" || $password == "" || $confirmp == "" || $gender==""){
            $error = "Ada FIELD KOSONG!";
        }else if (!str_contains($email, '@')  || !str_contains($email, '.')){
            $error = "Email tidak sesuai";
        }else if ($password != $confirmp){
            $error = "Password dan Confirm Password Tidak sesuai!";
        }else{
            $sql_u = "SELECT * FROM users WHERE us_username='$username'";
            $res_u = mysqli_query($con, $sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                $error = "Maaf... username telah digunakan"; 	
            }else{
                $id = (mysqli_query($con, "SELECT concat('US', lpad(ifnull(max(substr(us_id,3,3))+1, 1), 3, 0)) as 'ID' from users"));
                $row = mysqli_fetch_array($id);
                $id = $row['ID'];
                $gender = ($gender == "male"? 1 : 0);
                $result = mysqli_query($con, "insert into users values('$id', '$username', '$email', '$gender', '$password')");
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/general.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-dark">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style='height: 900px;'>
                <form class="col-4 bg-white border py-5 px-5" action="" method="post">
                    <h2 style="text-align: center;" class="hover-1">Register</h2>
                    <div class="form-floating mb-3 mt-5">
                        <input type="text" class="form-control bg-light form" id="floatingFull" name="username" placeholder=" ">
                        <label for="floatingFull" class="fw-bold">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-light form" id="floatingTel" name="email" placeholder=" ">
                        <label for="floatingTel" class="fw-bold">Email</label>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select bg-light fw-bold form" style="height: 55px;" name="gender" id="floatingGender">
                            <option class="fw-bold" value="" hidden>Gender</option>
                            <option class="" value="male">Male</option>
                            <option class="" value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control bg-light form" id="floatingPassword" name="password" placeholder=" ">
                        <label for="floatingPassword" class="fw-bold">Password</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control bg-light form" id="floatingConfirm" name="confirmp" placeholder=" ">
                        <label for="floatingConfirm" class="fw-bold">Confirm Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-secondary btn-login text-uppercase fw-bold hvr-overlay-from-center" type="submit" name='btn-register'>Register</button>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            Have an Account? <a href="login.php" class="hover" style="text-decoration: none;">Login</a>
                        </div>
                    </div>
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
                <nav class="navbar bg-transparent">
                    <div class="container-fluid justify-content-center align-items-center">
                        <a class="" href="index.php"><button class='btn btn-outline-primary'>Back to Home</button></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script>
       $(function(){
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
        })
    </script>
</body>
</html>