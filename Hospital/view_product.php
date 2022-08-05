<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    </head>
    <body>
        <?php
        // put your code here
        include '../Hospital/fragments/chemist_dashboard_header.html';
        echo "<h3 style='text-align:center;color:green'> Welcome to View Product Page</h3>";
        ?>
        <div>
            <?php
            $link = mysqli_connect("localhost", "root", "", "chemistdb");
            $qry = "select * from product ";
            $result = mysqli_query($link, $qry);
            if (mysqli_num_rows($result) > 0) {
                $cnt = 0;
                while ($r = mysqli_fetch_array($result)) {
                    if ($cnt == 0)
                        echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-12'>";
                    echo "<center><img src='$r[5]'/></center>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-12'>";
                    echo "<center>$r[2]</center>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-12'>";
                    echo "<center>Price :$r[4]</center>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                    $cnt++;
                    if ($cnt == 3) {
                        echo "</div>";
                        $cnt = 0;
                    }
                }
            } else {
                echo "<center><h2>No Product Found!!!</h2></center>";
            }
            ?>
        </div>
        <?php 
            include '../Hospital/fragments/my_chemist_footer.html';
        ?>

    </body>
</html>
