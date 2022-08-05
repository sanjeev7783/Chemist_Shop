<?php
    $msg="";
    if(isset($_POST['sub']))
    {
        $p_name=$_POST['product_name'];
        $p_price=$_POST['product_price'];
        $p_type=$_POST['product_type'];
        $mfg_date=$_POST['mfg_date'];
        $exp_date=$_POST['exp_date'];
        $sou=$_FILES['product_img']['tmp_name'];
        $des=$_SERVER['DOCUMENT_ROOT']."/Hospital/pimages/".$_FILES['product_img']['name'];
        $path="";
        if(move_uploaded_file($sou, $des))
                $path="pimages/".$_FILES['product_img']['name'];
     
        $link= mysqli_connect("localhost","root","","chemistdb");
        $qry="insert into product(name,type,price,image,manufactured_date,expiray_date) values('$p_name','$p_type',$p_price,'$path','$mfg_date','$exp_date')";
        mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)>0)
        {
            $msg="Product Added ";
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
        <title>Add Product </title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        // put your code here
        include '../Hospital/fragments/chemist_dashboard_header.html';
        echo "<h3 style='text-align:center;color:green'> Welcome to  Add Product Page</h3>";
        ?>
        
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <?php
                echo "<h3 style='text-align:center;color:green'>$msg</h3>";
                ?>
                <form method="post" enctype="multipart/form-data">
                    

                   
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="product_name" value="" placeholder="REDMI 9A" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <input type="text" name="product_type" value="" placeholder="syrup" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="product_price" value="" placeholder="7800" class="form-control" />
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="product_img" value=""  class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Manufacture date</label>
                        <input type="date" name="mfg_date" value="" placeholder="14-12-2022" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Expiry date</label>
                        <input type="date" name="exp_date" value="" placeholder="15-12-2023" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="sub" value="Submit" class="form-control btn btn-primary " />
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
