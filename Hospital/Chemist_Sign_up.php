<?php
    $msg="";
    if(isset($_POST['sub']))
    {
        $name=$_POST['chem_name'];
        $shop_name=$_POST['shop_name'];
        $email=$_POST['chem_email'];
        $mobile=$_POST['mob'];
        $phonepe=$_POST['phone_pe'];
        $shop_address=$_POST['shop_address'];
        $pwd=$_POST['pass'];
        
        $link= mysqli_connect("localhost","root","","chemistdb");
        $qry="insert into chemist(name,shop_name,emailID,phone,phone_pe_number,shop_address,password) values('$name','$shop_name','$email',$mobile,$phonepe,'$shop_address','$pwd')";
        mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)>0)
        {
            $msg="Registeration Done ";
        }
        else
        {
            $msg="Error is found ";
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
        <title>Register</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include '../Hospital/fragments/my_chemist_header.html';

        // put your code here
        ?>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <?php
                echo "<h3 style='text-align:center;color:green'>$msg</h3>";
                ?>
                <form method="post" action="Chemist_Sign_Up.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="chem_name" placeholder="UserName" value="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" name="shop_name" placeholder="Shri Ram Pharmacy" value="" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>E-mail ID</label>
                        <input type="email" name="chem_email" value="" placeholder="sanjeev77830@gmail.com" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="tel" name="mob" value="" placeholder="85213451010" class="form-control" />
                    </div>
                     <div class="form-group">
                        <label>Phone Pe Number</label>
                        <input type="tel" name="phone_pe" value="" placeholder="85213451010" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label>Shop Address</label>
                        <textarea  name="shop_address" rows="5" cols="55"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" value="" placeholder="User@password123" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cnf_password" placeholder="User@password123" value="" class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="sub" value="Sign Up" class="form-control btn btn-primary " />
                    </div>
                    
                </form>

            </div>
            <div class="col-sm-4">

            </div>
        </div>
        <?php
        include '../Hospital/fragments/my_chemist_footer.html';
        ?>

    </body>
</html>
