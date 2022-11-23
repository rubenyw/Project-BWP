<?php
    require('action.php');
    if(isset($_POST['btn-login'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        if ($username == "" || $password == "") {
            $error = "Ada isian kosong";
        }else {
            $query = mysqli_query($con, "SELECT * FROM users WHERE us_username = '$username'");
            if (mysqli_num_rows($query)> 0) {
                $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
                if ($result['us_password'] != $password){
                    $error = 'Password Salah!';
                }else { 
                    $_SESSION["userLogin"] = [
                        'username' => $result['us_username'],
                        'id' => $result['us_id'],
                        'email' => $result['us_email'],
                        'gender' => $result['us_gender'],
                        'password' => $result['us_password']
                    ];
                    header("Location: index.php");
                }
            }else{
                $error = "Username Tidak Terdaftar";
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
    <link href="assets/css/general.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-dark">
        <div class="container-fluid bg-transparent" style="height: 800px;">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-4 bg-white border py-5 px-5" action="" method="post">
                    <h2 style="text-align: center;" class="hover-1">Login</h2>
                    <div class="form-floating mb-3 mt-5">
                        <input type="text" class="form-control bg-light" id="floatingInput" name="username" placeholder=" ">
                        <label for="floatingInput" class="fw-bold">Username</label>
                    </div>
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control bg-light" id="floatingPassword" name="password" placeholder=" ">
                        <label for="floatingPassword" class="fw-bold">Password</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-secondary text-uppercase fw-bold hvr-overlay-from-center" type="submit" name="btn-login">Login</button>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            No Account? <a href="register.php" class="hover" style="text-decoration: none;">Register</a>
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
                <nav class="navbar bg-transparent">
                    <div class="container-fluid d-grid gap-2 justify-content-center align-items-center">
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
            formControl = $(".form-control");
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