<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/26/17
 * Time: 10:14 PM
 */
include('login.php');
?>

<html>
<title>Personal Center</title>

<head>
    <style type="text/css">
        <!--
        .STYLE3 {font-size: 20px; color: #0033FF; }
        .STYLE4 {font-size: 18px; color: #00BCFF;  }
        -->
    </style>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        .STYLE1 {font-size: 20px; color: #E15C00;}
        .STYLE2 {font-size: 18px; color: #000000;}
        -->
    </style>
</head>

<body>
<form id="myform" name="myform" method="post" action="">
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
    }
    ?>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">Personal Center</td>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Account: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['Acc']."</td>";
        ?>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Name: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['Trainername']."</td>";
        ?>
        <td><input type="text" name="username"></td>
        <td><input type="submit" name="update1"  value="Update"></td>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Gender: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['Gender']."</td>";
        ?>
        <td><select name="gender" style="width:90%;">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select></td>
        <td><input type="submit" name="update2"  value="Update"></td>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Gender: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['DOB']."</td>";
        ?>
        <td><input type="date" name="dob"></td>
        <td><input type="submit" name="update3"  value="Update"></td>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Email: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['Email']."</td>";
        ?>
        <td><input type="text" name="email"></td>
        <td><input type="submit" name="update4"  value="Update"></td>
    </tr>
    <tr>
        <td class="STYLE4" align="center"> Money: </td>
        <?php
        echo "<td class='STYLE2' align='center'>".$row['Money']."</td>";
        ?>
    </tr>
    <?php
    if(isset($_POST['update1'])){
        $newname = $_POST['username'];
        $query1 = "update Trainers set Trainername = '$newname' where TrainerID = $tid";
        if(mysqli_query($conn, $query1)){
            echo "<script> alert('Update Successfully'); </script>";
            echo "<script> window.location = 'account.php';</script>";
        }
        else{
            echo "<script> alert('Update failed'); </script>";
        }
    }

    if(isset($_POST['update2'])){
        $newg = $_POST['gender'];
        $query2 = "update Trainers set Gender = '$newg' where TrainerID = $tid";
        if(mysqli_query($conn, $query2)){
            echo "<script> alert('Update Successfully'); </script>";
            echo "<script> window.location = 'account.php';</script>";
        }
        else{
            echo "<script> alert('Update failed'); </script>";
        }
    }

    if(isset($_POST['update3'])){
        $newdob = $_POST['dob'];
        $query3 = "update Trainers set DOB = '$newdob' where TrainerID = $tid";
        if(mysqli_query($conn, $query3)){
            echo "<script> alert('Update Successfully'); </script>";
            echo "<script> window.location = 'account.php';</script>";
        }
        else{
            echo "<script> alert('Create account failed'); </script>";
        }
    }
    if(isset($_POST['update4'])){
        $newemail = $_POST['email'];
        $query4 = "update Trainers set Email = '$newemail' where TrainerID = $tid";
        if(mysqli_query($conn, $query4)){
            echo "<script> alert('Update Successfully'); </script>";
            echo "<script> window.location = 'account.php';</script>";
        }
        else{
            echo "<script> alert('Create account failed'); </script>";
        }
    }
    ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">My Collection</td>
    </tr><br>
    <?php
        $myquery = "select * from Pokemon where PokemonID in (select PokemonID from Owns where TrainerID = $tid)";
        $myresult = mysqli_query($conn,$myquery);
        $numrow = mysqli_num_rows($myresult);
        if($numrow == 0){
    ?>
    <tr>
        <td colspan="2" class="STYLE2" align="center"> No Pokemon Collection</td>
        <td colspan="2" class="STYLE2" align="center"><a href="adventure.php">Go catch some!</a></td>
    </tr>
    <?php
        }
        else{
    ?>
        <tr>
            <td align="center" class = "STYLE3">Number</td>
            <td align="center" class = "STYLE3">Name</td>
            <td align="center" class = "STYLE3">Details</td>
        </tr>
        <?php
                while($myrow = mysqli_fetch_assoc($myresult)){
                    $pid = $myrow['PokemonID'];
                    echo "<tr>";
                    echo "<td align = 'center' class = 'STYLE2'>".$myrow['PokemonID']."</td>";
                    echo "<td align = 'center' class = 'STYLE2'>".$myrow['pname']."</td>";
                    echo "<td align = 'center' class = 'STYLE2'><a href='details.php?pid=$pid'>".$myrow['pname']."</td>";
                    echo "<td align = 'center' class = 'STYLE2'><a href='shop.php'>" .Trade. "</td>";
                    echo "</tr>";
                }
            }
        ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td colspan = "4" align="center" class="STYLE1">My Pokeballs</td>
    </tr><br>
    <?php
    $pquery = "select p.Ballid as id, p.pname, h.Quantities from Pokeballs p, Haspokeballs h where p.Ballid = h.Ballid and h.TrainerID = $tid";
    $presult = mysqli_query($conn,$pquery);
    $pnumrow = mysqli_num_rows($presult);
    if($pnumrow == 0){
        ?>
        <tr>
            <td colspan="2" class="STYLE2" align="center"> No Pokeball Collection</td>
            <td colspan="2" class="STYLE2" align="center"><a href="shop.php">Go buy some!</a></td>
        </tr>
        <?php
    }
    else{
        ?>
        <tr>
            <td align="center" class = "STYLE3">Number</td>
            <td align="center" class = "STYLE3">Name</td>
            <td align="center" class = "STYLE3">Quantities</td>
        </tr>
        <?php
        while($prow = mysqli_fetch_assoc($presult)){
            echo "<tr>";
            echo "<td align = 'center' class = 'STYLE2'>".$prow['id']."</td>";
            echo "<td align = 'center' class = 'STYLE2'>".$prow['pname']."</td>";
            echo "<td align = 'center' class = 'STYLE2'>".$prow['Quantities']."</td>";
            echo "<td align = 'center' class = 'STYLE2'><a href='shop.php'>" .Trade. "</td>";
            echo "</tr>";
        }
    }
    ?>

</table>
</form>
</body>

</html>