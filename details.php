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
        echo "window.location = 'home.php';";
        echo "</script>";
    }
    else{
        $pid = $_GET['pid'];
        $pic = "img/Pokemon/{$pid}.png";
        $query1 = "select * from Pokemon where PokemonID = $pid";
        $result1 = mysqli_query($conn, $query1);
        $check1 = mysqli_num_rows($result1);
        if($check1 != 1){
            echo "<script>";
            echo "alert('Wrong PokemonID!');";
            echo "window.location = 'home.php';";
            echo "</script>";
        }
        else{
            $row1 = mysqli_fetch_assoc($result1);
        }

        $query2 = "select * from Ttype where TypeID in (select TypeID from Hastype where PokemonID = $pid)";
        $result2 = mysqli_query($conn, $query2);

        $query3 = "select * from Ttype where TypeID in (select TypeID from Hasweakness where PokemonID = $pid)";
        $result3 = mysqli_query($conn, $query3);

        $query4 = "select * from Pokemon where PokemonID = (select ChildID from Evolve where ParentID = $pid)";
        $result4 = mysqli_query($conn, $query4);
        $num1 = mysqli_num_rows($result4);

        $query5 = "select * from Pokemon where PokemonID in (select ParentID from Evolve where ChildID = $pid)";
        $result5 = mysqli_query($conn, $query5);
        $num2 = mysqli_num_rows($result5);

        $next = $pid+1;
        $pre  = $pid-1;
        if($next > 151)
            $next = 001;
        if($pre  < 1)
            $pre = 151;

        function formatNbr($nbr){
            if ($nbr < 10)
                return "00".$nbr;
            elseif ($nbr >= 10 && $nbr < 100 )
                return "0".$nbr;
            else
                return strval($nbr);
        }

        $next = formatNbr($next);
        $pre = formatNBr($pre);


        $nextquery = "select pname from Pokemon where PokemonID = $next";
        $nextresult = mysqli_query($conn, $nextquery);
        $nextrow = mysqli_fetch_assoc($nextresult);
        $nextname = $nextrow['pname'];
        $prequery = "select pname from Pokemon where PokemonID = $pre";
        $preresult = mysqli_query($conn, $prequery);
        $prerow = mysqli_fetch_assoc($preresult);
        $prename = $prerow['pname'];
    }
    ?>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="left">
            <?php
                echo "<a href='details.php?pid=$pre'>";
                echo "#";
                echo $pre;
                echo " ";
                echo $prename;
            ?>
        </td>
        <td bgcolor="#FFFFFF" colspan="2">&nbsp;</td>
        <td align="right">
            <?php
            echo "<a href='details.php?pid=$next'>";
            echo $nextname;
            echo " #";
            echo $next;
            ?>
        </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" align="center" class="STYLE1">
            <?php
                echo $row1['pname'];
                echo " #";
                echo $pid;
            ?>
        </td>
    </tr>
    <tr>
        <td colspan='2' valign="top">
            <img src=<?php echo $pic; ?> width='400' height='400'>
        </td>
        <td colspan="2">
            <table width="400" height="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2" align="center" class="STYLE2" height="100"> Description </td>
                </tr>
                <tr>
                    <td colspan="2" class="STYLE2" height="100">
                        <?php echo $row1['Description']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="left" height="200" class="STYLE3"> Gender </td>
                    <td align="center" height="200" class="STYLE2">
                        <?php
                        if($row1['Gender'] == 1)
                            echo "♂ ♀";
                        else if($row1['Gender'] == 2)
                            echo "♂";
                        else if($row1['Gender'] == 3)
                            echo "♀";
                        else
                            echo "Unknown";
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE3"> Type </td>
    <?php
        while($row2 = mysqli_fetch_assoc($result2)){
            $id = $row2['TypeID'];
            echo "<td align='center'>";
            echo "<a href='home.php?type=$id' style='color: #FF00CF'>";
            echo $row2['Typename'];
            echo "</td>";
        }
    ?>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE3"> Weakness </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
    <?php
        while($row3 = mysqli_fetch_assoc($result3)){
            $id = $row3['TypeID'];
            echo "<td align='center'>";
            echo "<a href='home.php?type=$id' style='color: #FF00CF'>";
            echo $row3['Typename'];
            echo "</td>";
        }
    ?>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center"> <h3>Stats</h3> </td>
    </tr>
    <tr>
        <td colspan="4" valign="top">
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width = "16%" align = "center" class = "STYLE4">HP</td>
                    <td width = "16%" align = "center" class = "STYLE4">Attack</td>
                    <td width = "16%" align = "center" class = "STYLE4">Defense</td>
                    <td width = "16%" align = "center" class = "STYLE4">Special  Attack</td>
                    <td width = "16%" align = "center" class = "STYLE4">Special Defense</td>
                    <td width = "16%" align = "center" class = "STYLE4">Speed</td>
                </tr>
                <tr class="blank_row">
                    <td bgcolor="#FFFFFF" colspan="6">&nbsp;</td>
                </tr>
                <?php
                    echo "<tr>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['Hp']."</td>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['Attack']."</td>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['Defence']."</td>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['SAttack']."</td>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['SDefence']."</td>";
                    echo "<td align = 'center' class = 'STYLE5'>".$row1['Speed']."</td>";
                    echo "</tr>";
                ?>
            </table>
        </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" colspan="4"> <h3>Evolutions</h3> </td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE6"><b> Child(From) </b></td>
        <?php
            if($num1 == 0){
                echo "<td align='left' colspan='3'>";
                echo "This Pokemon has no child to evolve from";
                echo "</td>";
            }
            else{
                $row4 = mysqli_fetch_assoc($result4);
                $childid = $row4['PokemonID'];
                $childname = $row4['pname'];
                echo "<td align='left'>";
                echo "<a href='details.php?pid=$childid'>";
                echo "#";
                echo $childid;
                echo " ";
                echo $childname;
                echo "</td>";
            }
        ?>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td align="center" class="STYLE6"><b>Parent(To)</b></td>
        <?php
            if($num2 == 0){
                echo "<td align='left' colspan='3'>";
                echo "This Pokemon can't evolve anymore";
                echo "</td>";
            }
            else{
                while($row5 = mysqli_fetch_assoc($result5)){
                    $parentid = $row5['PokemonID'];
                    $parentname = $row5['pname'];
                    echo "<td align='left'>";
                    echo "<a href='details.php?pid=$parentid'>";
                    echo "#";
                    echo $parentid;
                    echo " ";
                    echo $parentname;
                    echo "</td>";
                }
            }
        ?>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
    <tr class="blank_row">
        <td bgcolor="#FFFFFF" colspan="4">&nbsp;</td>
    </tr>
</table>
</body>

</html>
