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
        }else if ($password != $confirmp){
            $error = "Password dan Confirm Password Tidak sesuai!";
        }
        else{
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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/form.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        
        <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style='height: 900px;'>
                <form class="col-4 bg-white border py-5 px-5" action="" method="post">
                    <h2>Register</h2>
                    <div class="form-floating mb-3 mt-5">
                        <input type="text" class="form-control bg-light form" id="floatingFull" name="username" placeholder=" ">
                        <label for="floatingFull" class="fw-bold">User Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control bg-light form" id="floatingTel" name="email" placeholder=" ">
                        <label for="floatingTel" class="fw-bold">Email</label>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select bg-light fw-bold form" style="height: 55px;" name="gender" id="floatingGender">
                            <option class="fw-bold" value="" hidden>Gender</option>
                            <option class="fw-bold" value="male">Male</option>
                            <option class="fw-bold" value="female">Female</option>
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
                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name='btn-register'>Register</button>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            Have an Account? <a href="login.php">Login</a>
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
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        window.onload = (event) => {
            formControl = document.querySelectorAll(".form");
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
        };
    </script>
</body>
</html>