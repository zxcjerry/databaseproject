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
        .STYLE4 {font-size: 16px; color: #FF00CF; }
        -->
    </style>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        .STYLE1 {font-size: 20px; color: #E15C00;}
        .STYLE2 {font-size: 13px; color: #000000;}
        -->
    </style>
</head>

<body>
<form id="myform" name="myform" method="post" action="">
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
            $money = $row['Money'];
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
        <td align="center" class="STYLE3"> Name </td>
        <td align="center" class="STYLE3"> Possibility of catching </td>
        <td align="center" class="STYLE3"> Price </td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Pokeball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 1 </td>
        <td><input type="submit" name="buy1" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Great ball</td>
        <td align="center" class="STYLE2"> 1.5</td>
        <td align="center" class="STYLE4"> 2 </td>
        <td><input type="submit" name="buy2" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Ultra ball </td>
        <td align="center" class="STYLE2"> 2.0</td>
        <td align="center" class="STYLE4"> 4 </td>
        <td><input type="submit" name="buy3" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Master ball</td>
        <td align="center" class="STYLE2"> 100</td>
        <td align="center" class="STYLE4"> 1000 </td>
        <td><input type="submit" name="buy4" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Drive ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 5 </td>
        <td><input type="submit" name="buy5" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Fast ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 5 </td>
        <td><input type="submit" name="buy6" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Beast ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 4 </td>
        <td><input type="submit" name="buy7" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Dusk ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 6 </td>
        <td><input type="submit" name="buy8" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Nest ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 3 </td>
        <td><input type="submit" name="buy9" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Net ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 2 </td>
        <td><input type="submit" name="buy10" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Lure ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 5 </td>
        <td><input type="submit" name="buy11" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Quick ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 6 </td>
        <td><input type="submit" name="buy12" value="buy"></td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Premier ball</td>
        <td align="center" class="STYLE2"> 1.0</td>
        <td align="center" class="STYLE4"> 8 </td>
        <td><input type="submit" name="buy13" value="buy"></td>
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

</table>
</form>
</body>

</html>