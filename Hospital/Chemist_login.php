<?php
$msg = "";
if (isset($_POST['login_submit'])) {
    $emailID = $_POST['username'];
    $password = $_POST['password'];
    $link = mysqli_connect("localhost", "root", "", "Chemistdb");
    $qry = "select emailID,password from chemist where emailID='$emailID' and password='$password'";
    $result = mysqli_query($link, $qry);
    if (mysqli_num_rows($result) > 0) {

//        $msg = "Logged in Successfully ";
        echo '<script>'
        . 'window.location.replace("Chemist_dashboard.php")'
                . '</script>';

        
    } else {
        $msg = "Invalid User!";
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include '../Hospital/fragments/my_chemist_header.html';
        echo "<div>";
        echo "<p align='center'>Welcome to Login Page</p>";
        echo "</div>";
// put your code here
        ?>
        <div class="container-fluid row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">

                <div >


                    <?php
                    echo "<h3 style='text-align:center;color:green'>$msg</h3>";
                    ?>

                    <form method="post" class="form-group">
                        <input type="text" placeholder="Email address or phone number" name="username" value="" class="form-control"/><br>
                        <input type="text" placeholder="Password" name="password" value="" class="form-control"/><br>
                        <input type="submit"  name="login_submit" value="LogIn"class="form-control btn btn-primary"/>
                    </form>

                </div>

            </div>
            <div class="col-sm-4">

            </div>

        </div>
        <div class="container-fluid row">
            <div class="col-sm-4">
                <img src="Chemist_Images/handlogo.png" alt="image" height="200px" width="300px"/>

            </div>
            <div class="col-sm-4">
                <img src="Chemist_Images/logo.png" alt="image" height="200px" width="400px"/>


            </div>
            <div class="col-sm-4">
                <img src="Chemist_Images/handlogo.png" alt="image" height="200px" width="300px"/>


            </div>
        </div>
        <?php
        include '../Hospital/fragments/my_chemist_footer.html';
        ?>

    </body>
</html>
