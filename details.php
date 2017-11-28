<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/27/17
 * Time: 11:55 AM
 */
    include('login.php');
?>

<html>
<title>Details</title>

<head>
    <style type="text/css">
        <!--
        .STYLE3 {font-size: 20px; color: #0033FF; }
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
<table width="800" height="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="4"><img src="img/banner.jpg" width="799" height="120" /></td>
    </tr>
    <tr>
        <td width="160" align="center"><span class="STYLE3"><a href="home.php" target="_parent">Pokedex</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="adventure.php" target="_parent">Adventure</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="shop.php" target="_parent">Shop</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="account.php" target="_parent">Personal Center</a></span></td>
    </tr>
    <?php
    if(!isset($_GET['pid'])){
        echo "<script>";
        echo "alert('Wrong opening!');";
        echo "window.location = 'home.php';";
        echo "</script>";
    }
    else{
        $pid = $_GET['pid'];

    }

    ?>
    <tr>
        <td colspan="4" align="center"> Still under construction for collecting Pokemon Data </td>
    </tr>

</table>
</body>

</html>
