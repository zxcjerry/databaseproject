<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/26/17
 * Time: 10:12 PM
 */
include('login.php');
?>

<html>
<title>Adventure</title>

<head>
    <style type="text/css">
        <!--
        .STYLE3 {font-size: 20px; color: #0033FF; }
        -->
    </style>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        .STYLE1 {font-size: 30px; color: #E15C00;}
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

    }
    ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">Adventure</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE3"> ID </td>
        <td align="center" class="STYLE3"> Place </td>
        <td align="center" class="STYLE3"> Weather </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <?php
        $query = "select * from Places";
        $result = mysqli_query($conn, $query);
        while($row=mysqli_fetch_assoc($result)){
            $pid = $row['PlacesID'];
            echo "<tr>";
            echo "<td align='center' class='STYLE2'>".$row['PlacesID']."</td>";
            echo "<td align='center' class='STYLE2'>".$row['Pname']."</td>";
            echo "<td align='center' class='STYLE2'>".$row['climate']."</td>";
            echo "<td align='center'><a href='places.php?pid=$pid'> Explore </button></td>";
            echo "</tr>";
        }
    ?>


</table>
</form>
</body>

</html>