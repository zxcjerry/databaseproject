<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/14/17
 * Time: 5:41 PM
 */
    include('login.php');
?>

<html>
<title> Home </title>

<head>
<style type="text/css">
    <!--
    .STYLE3 {font-size: 20px; color: #0033FF; }
    -->
</style>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    <!--
    .STYLE5 {font-size: 14px}
    .STYLE7 {color: #0F93FF}
    -->
</style>
</head>

<body>
<table width="799" height="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="4"><img src="img/banner.jpg" width="799" height="120" /></td>
    </tr>
    <tr>
        <td width="160" align="center"><span class="STYLE3"><a href="home.php" target="_parent">Pokedex</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="adventure.php" target="_parent">Adventure</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="shop.php" target="_parent">Shop</a></span></td>
        <td width="160" align="center"><span class="STYLE3"><a href="account.php" target="_parent">Personal Center</a></span></td>
    </tr>
    <tr>
        <td colspan="4" valign="top"><form id="myform" name="myform" method="post" action="">
                <table width="63%" height="173" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="right" class="STYLE5 STYLE7">PokemonID：</td>
                        <td><label>
                                <input name="bookno" type="text" id="bookno" />
                            </label></td>
                    </tr>

                    <tr>
                        <td align="right">
                            <input type="submit" name="button" id="button" value="提交" />
                        </td>
                    </tr>
                </table>
            </form><br>
        </td>
    </tr>
</table>
</body>

</html>
