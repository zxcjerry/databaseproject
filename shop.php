<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/26/17
 * Time: 10:13 PM
 */
    include('login.php');
?>

<html>
<title>Shops</title>

<head>
    <style type="text/css">
        <!--
        .STYLE3 {font-size: 20px; color: #0033FF; }
        .STYLE4 {font-size: 18px; color: #FF00CF; }
        -->
    </style>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        .STYLE1 {font-size: 30px; color: #E15C00;}
        .STYLE2 {font-size: 18px; color: #000000;}
        -->
    </style>
</head>

<body>
<table width="800" height="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="4"><img src="img/banner.jpg" width="799" height="140" /></td>
    </tr>
    <tr>
        <td width="160" align="center"><span class="STYLE3"><a href="home.php" target="_parent">Pokedex</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="adventure.php" target="_parent">Adventure</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="shop.php" target="_parent">Shop</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="account.php" target="_parent">Personal Center</a></span></td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <?php
        session_start();

        if(!isset($_SESSION['user'])){
            echo "<script>";
            echo "alert('Please register or login first!');";
            echo "window.location = 'home.php';";
            echo "</script>";
        }
        else{
            $tid = $_SESSION['userID'];
            $query = "select * from Trainers where TrainerID = $tid";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $money = (int)$row['Money'];
        }

        echo "<tr>";

        echo "<td colspan='4' align='right' class='STYLE3'>Money : $money</td>";
        echo "</tr>";
    ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">Pokeballs</td>
    </tr>
    <tr>
        <td colspan="4" valign="top">
            <form id="myform" name="myform" method="post" action="">
                <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" class="STYLE3"> Picture</td>
                        <td align="center" class="STYLE3"> Name </td>
                        <td align="center" class="STYLE3"> Capture Rate </td>
                        <td align="center" class="STYLE3"> Price </td>
                        <td align="center" class="STYLE3"> Quantities</td>
                        <td align="center" class="STYLE3"> &nbsp;</td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/1.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Pokeball</td>
                        <td align="center" class="STYLE2"> 1X</td>
                        <td align="center" class="STYLE4"> 1 </td>
                        <td><input name="num1" type="text" id="number"/></td>
                        <td><input type="submit" name="buy1" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/2.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Great ball</td>
                        <td align="center" class="STYLE2"> 1.5X</td>
                        <td align="center" class="STYLE4"> 2 </td>
                        <td><input name="num2" type="text" id="number"/></td>
                        <td><input type="submit" name="buy2" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/3.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Ultra ball </td>
                        <td align="center" class="STYLE2"> 2.0X</td>
                        <td align="center" class="STYLE4"> 4 </td>
                        <td><input name="num3" type="text" id="number"/></td>
                        <td><input type="submit" name="buy3" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/4.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Master ball</td>
                        <td align="center" class="STYLE2"> Never Fails</td>
                        <td align="center" class="STYLE4"> 1000 </td>
                        <td><input name="num4" type="text" id="number"/></td>
                        <td><input type="submit" name="buy4" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/5.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Drive ball</td>
                        <td align="center" class="STYLE2"> 3.5X when in water</td>
                        <td align="center" class="STYLE4"> 5 </td>
                        <td><input name="num5" type="text" id="number"/></td>
                        <td><input type="submit" name="buy5" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/6.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Fast ball</td>
                        <td align="center" class="STYLE2"> 4X when 100+ speed</td>
                        <td align="center" class="STYLE4"> 5 </td>
                        <td><input name="num6" type="text" id="number"/></td>
                        <td><input type="submit" name="buy6" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/7.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Beast ball</td>
                        <td align="center" class="STYLE2"> 5X on Beast Pokemon</td>
                        <td align="center" class="STYLE4"> 4 </td>
                        <td><input name="num7" type="text" id="number"/></td>
                        <td><input type="submit" name="buy7" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/8.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Dusk ball</td>
                        <td align="center" class="STYLE2"> 3.5X in cave or at night</td>
                        <td align="center" class="STYLE4"> 6 </td>
                        <td><input name="num8" type="text" id="number"/></td>
                        <td><input type="submit" name="buy8" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/9.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Nest ball</td>
                        <td align="center" class="STYLE2"> 2X at level 31</td>
                        <td align="center" class="STYLE4"> 3 </td>
                        <td><input name="num9" type="text" id="number"/></td>
                        <td><input type="submit" name="buy9" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/10.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Net ball</td>
                        <td align="center" class="STYLE2"> 3.5X on Water or Bug type</td>
                        <td align="center" class="STYLE4"> 2 </td>
                        <td><input name="num10" type="text" id="number"/></td>
                        <td><input type="submit" name="buy10" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/11.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Lure ball</td>
                        <td align="center" class="STYLE2"> 5X fishing</td>
                        <td align="center" class="STYLE4"> 5 </td>
                        <td><input name="num11" type="text" id="number"/></td>
                        <td><input type="submit" name="buy11" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/12.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Quick ball</td>
                        <td align="center" class="STYLE2"> 5X on first turn of battle</td>
                        <td align="center" class="STYLE4"> 6 </td>
                        <td><input name="num12" type="text" id="number"/></td>
                        <td><input type="submit" name="buy12" value="buy"></td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"><img src="img/Pokeballs/13.png" width="32" height="32"></td>
                        <td align="center" class="STYLE2"> Premier ball</td>
                        <td align="center" class="STYLE2"> 1X</td>
                        <td align="center" class="STYLE4"> 1 </td>
                        <td><input name="num13" type="text" id="number"/></td>
                        <td><input type="submit" name="buy13" value="buy"></td>
                    </tr>
                </table>
                <?php
                if(isset($_POST['buy1'])){
                    if(!is_numeric($_POST['num1'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 1;
                        $price = 1;
                        $num   = (int)$_POST['num1'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy2'])){
                    if(!is_numeric($_POST['num2'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 2;
                        $price = 2;
                        $num   = (int)$_POST['num2'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy3'])){
                    if(!is_numeric($_POST['num3'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 3;
                        $price = 4;
                        $num   = (int)$_POST['num3'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy4'])){
                    if(!is_numeric($_POST['num4'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 4;
                        $price = 1000;
                        $num   = (int)$_POST['num4'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy5'])){
                    if(!is_numeric($_POST['num5'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 5;
                        $price = 5;
                        $num   = (int)$_POST['num5'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy6'])){
                    if(!is_numeric($_POST['num6'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 6;
                        $price = 5;
                        $num   = (int)$_POST['num6'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy7'])){
                    if(!is_numeric($_POST['num7'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 7;
                        $price = 4;
                        $num   = (int)$_POST['num7'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy8'])){
                    if(!is_numeric($_POST['num8'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 8;
                        $price = 6;
                        $num   = (int)$_POST['num8'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy9'])){
                    if(!is_numeric($_POST['num9'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 9;
                        $price = 3;
                        $num   = (int)$_POST['num9'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy10'])){
                    if(!is_numeric($_POST['num10'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else{
                        $ball  = 10;
                        $price = 2;
                        $num   = (int)$_POST['num10'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy11'])){
                    if(!is_numeric($_POST['num11'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else {
                        $ball  = 11;
                        $price = 5;
                        $num   = (int)$_POST['num11'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy12'])){
                    if(!is_numeric($_POST['num12'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else {
                        $ball  = 12;
                        $price = 6;
                        $num   = (int)$_POST['num12'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                if(isset($_POST['buy13'])){
                    if(!is_numeric($_POST['num13'])){
                        echo "<script>";
                        echo "alert('Wrong Input');";
                        echo "</script>";
                    }
                    else {
                        $ball  = 13;
                        $price = 1;
                        $num   = (int)$_POST['num13'];
                        $total = $price * $num;
                        if($num > 20){
                            echo "<script>";
                            echo "alert('At most buy 20 one time!');";
                            echo "</script>";
                        }
                        else if($money < $total){
                            echo "<script>";
                            echo "alert('Not enough money!');";
                            echo "</script>";
                        }
                        else{
                            $money = $money - $total;
                            $query1 = "update Trainers set Money = $money where TrainerID = $tid";
                            if(mysqli_query($conn, $query1)){
                                $query2  = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $ball";
                                $result2 = mysqli_query($conn, $query2);
                                $numrow = mysqli_num_rows($result2);
                                $query3;
                                if($numrow == 0){
                                    $query3 = "insert into Haspokeballs (TrainerID, Ballid, Quantities) value ($tid, $ball, $num)";
                                }
                                else {
                                    $rows = mysqli_fetch_assoc($result2);
                                    $owns = (int)$rows['Quantities'];
                                    $num = $num + $owns;
                                    $query3 = "update Haspokeballs set Quantities = $num where TrainerID = $tid and Ballid = $ball";
                                }

                                if(mysqli_query($conn, $query3)){
                                    echo "<script> alert('Purchase successfully'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                                else{
                                    echo "<script> alert('Failed to buy'); </script>";
                                    echo "<script> window.location = 'shop.php';</script>";
                                }
                            }
                            else{
                                echo "<script> alert('Failed to buy'); </script>";
                            }
                        }
                    }
                }

                ?>
            </form>
        </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">Pokemon</td>
    </tr>
    <tr>
        <td colspan="4" align="center" class="STYLE2">No Pokemon for sale yet!</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
</table>
</body>

</html>