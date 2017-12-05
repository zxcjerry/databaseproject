<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 12/4/17
 * Time: 3:51 PM
 */
include('login.php');
?>

<html>
<title>Places</title>

<head>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        <!--
        .STYLE1 {font-size: 30px; color: #E15C00;}
        .STYLE2 {font-size: 20px; color: #000000;}
        .STYLE3 {font-size: 20px; color: #0033FF;}
        .STYLE4 {font-size: 15px; color: #000000;}
        .STYLE5 {font-size: 15px; color: #FF00CF;}
        .STYLE6 {font-size: 15px; color: #098DEE;}
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
    if(!isset($_GET['pid'])){
        echo "<script>";
        echo "alert('Wrong opening!');";
        echo "window.location = 'adventure.php';";
        echo "</script>";
    }
    else {
        $pid = (int)$_GET['pid'];
        if($pid < 1 or $pid > 21){
            echo "<script>";
            echo "alert('Place don't exist!');";
            echo "window.location = 'adventure.php';";
            echo "</script>";
        }

        $query = "select * from Places where PlacesID = $pid";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $name = $row['Pname'];

        $tid = $_SESSION['userID'];
    }
    ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" colspan="4" class="STYLE1"> <?php echo $name; ?></td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE2"> Pokemon: </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <?php
        $query1 = "select PokemonID from Livesin where PlacesID = $pid";
        $result1 = mysqli_query($conn, $query1);
        $iid[3];
        $j = 0;
        while($row1 = mysqli_fetch_assoc($result1)){
            $id = $row1['PokemonID'];
            $iid[$j] = $id;
            $j++;
            $pic = "img/Pokemon/{$id}.png";
            echo "<td align='center'>";
            echo "<a href='details.php?pid=$id'>";
            echo "<img src=".$pic." width='120' height='120'>";
            echo "</td>";
        }
        ?>
        <td algin="center"><input type="submit" name="explore"  value="explore" style="width:60%"></td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <?php
        if(isset($_POST['explore'])){
            $rand = rand(1,10);
            if($rand < 6){
                $nextpic = "img/Pokemon/{$iid[0]}.png";
                $PokemonID = $iid[0];
                $successrate = 30;
            }
            else if(rand < 9){
                $nextpic = "img/Pokemon/{$iid[1]}.png";
                $PokemonID = $iid[1];
                $successrate = 10;
            }
            else if(rand < 10){
                $nextpic = "img/Pokemon/{$iid[2]}.png";
                $PokemonID = $iid[2];
                $successrate = 5;
            }
            else{
                echo "<script>";
                echo "alert('You found $10! Nice job!');";
                echo "</script>";
                $query2 = "update Trainers set Money = (select (Money+10) from Trainers where TrainerID = $tid) where TrainerID = $tid";
                mysqli_query($conn, $query2);
            }
        }

        if(isset($nextpic)){
            $query3 = "select * from Haspokeballs where TrainerID = $tid";
            $result3 = mysqli_query($conn, $query3);
            $ballnum = mysqli_num_rows($result3);
    ?>

    <tr>
        <td colspan="2" align="center"><img src='<?php echo $nextpic; ?>' width="240" height="240"></td>
        <td colspan="2" valign="top">
            <table width="300" height="240" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="33%" height="30" align="left" class="STYLE6"> Balls </td>
                    <td width="33%" height="30" align="left" class="STYLE6"> Quantities </td>
                    <td width="33%" height="30" align="center" class="STYLE6"> &nbsp; </td>
                </tr>
                <?php
                if($ballnum == 0){
                ?>
                <tr>
                    <td colspan="3" align="center" class="STYLE4"> You don't have any balls, <a href="shop.php">go buy some !</a></td>
                </tr>
                <?php
                }
                else{
                    while($row2 = mysqli_fetch_assoc($result3)){
                        $ballid = $row2['Ballid'];
                        $ballpic = "img/Pokeballs/{$row2['Ballid']}.png";
                ?>
                <tr>
                    <td><img src="<?php echo $ballpic; ?>" width="32" height="32" align="center"></td>
                    <td align="left" class="STYLE4"><?php echo $row2['Quantities']; ?></td>
                    <td><input type="submit" name="<?php echo $ballid; ?>" value="catch"></td>
                </tr>
                <tr class="blank_row">
                    <td bgcolor="#FFFFFF" colspan="2">&nbsp;</td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </td>
    </tr>
    <?php
        }

        if(isset($_POST['1']))
            $useid = 1;

        if(isset($_POST['2'])){
            $useid = 2;
            $successrate = $successrate * 1.5;
        }

        if(isset($_POST['3'])){
            $useid = 3;
            $successrate = $successrate * 2;
        }

        if(isset($_POST['4'])){
            $useid = 4;
            $successrate = 1;
        }

        if(isset($_POST['5']))
            $useid = 5;

        if(isset($_POST['6']))
            $useid = 6;

        if(isset($_POST['7']))
            $useid = 7;

        if(isset($_POST['8']))
            $useid = 8;

        if(isset($_POST['9']))
            $useid = 9;

        if(isset($_POST['10']))
            $useid = 10;

        if(isset($_POST['11']))
            $useid = 11;

        if(isset($_POST['12']))
            $useid = 12;

        if(isset($_POST['13']))
            $useid = 13;

        if(isset($useid)){
            $query4 = "select Quantities from Haspokeballs where TrainerID = $tid and Ballid = $useid";
            $result4 = mysqli_query($conn, $query4);
            $row4 = mysqli_fetch_assoc($result4);
            $current = (int)$row4['Quantities'];
            $current = $current - 1;
            if($current == 0)
                $query5 = "delete from Haspokeballs where TrainerID = $tid and Ballid = $useid";
            else
                $query5 = "update Haspokeballs set Quantities = $current where TrainerID = $tid and Ballid = $useid";

            mysqli_query($conn, $query5);

            $success = rand(1, 100);
            if($successrate > $success){
                $query6 = "insert into Owns (TrainerID, PokemonID) value($tid, $PokemonID)";
                mysqli_query($query6);
                echo "<script>";
                echo "alert('Congratulations! You have caught it.');";
                echo "window.location = 'adventure.php';";
                echo "</script>";
            }
            else{
                echo "<script>";
                echo "alert('Sorry, Pokemon escaped and ran away!');";
                echo "window.location = 'adventure.php';";
                echo "</script>";
            }
        }
    ?>


    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
</table>
</form>
</body>

</html>