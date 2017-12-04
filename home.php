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
    .STYLE1 {font-size: 20px; color: #E15C00;}
    .STYLE2 {font-size: 13px; color: #000000;}
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
    <tr>
        <td colspan="4" valign="top">
            <form id="myform" name="myform" method="post" action="">
                <table width="90%" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan = "2" align="left" class="STYLE1">Number</td>
                        <td colspan = "4"><label>
                                <input name="number" type="text" id="number" style="width:90%"/>
                            </label></td>
                        <td align="left">
                            <input type="submit" name="search1" id="search1" value="search" style="width:90%"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2" align="left" class="STYLE1">Name</td>
                        <td colspan = "4"><label>
                                <input name="name" type="text" id="name" style="width:90%"/>
                            </label></td>
                        <td align="left">
                            <input type="submit" name="search2" id="search2" value="search" style="width:90%"/>
                        </td>
                        <td colspan = "2">
                            <input type="submit" name="surprise" id="surprise" value="surprise me" style="width:90%"/>
                        </td><br>
                    </tr>
                    <tr>
                        <td width = "11%" align = "left" class = "STYLE3">Number</td>
                        <td width = "11%" align = "left" class = "STYLE3">Name</td>
                        <td width = "11%" align = "left" class = "STYLE3">HP</td>
                        <td width = "11%" align = "left" class = "STYLE3">Attack</td>
                        <td width = "11%" align = "left" class = "STYLE3">Defense</td>
                        <td width = "11%" align = "left" class = "STYLE3">Special Attack</td>
                        <td width = "11%" align = "left" class = "STYLE3">Special Defense</td>
                        <td width = "11%" align = "left" class = "STYLE3">Speed</td>
                        <td width = "11%" align = "left" class = "STYLE3">Details</td>
                    </tr>
                    <?php
                    if(isset($_POST['search1'])){
                        $s = $_POST['number'];
                        $query = "select * from Pokemon where PokemonID = $s";
                    }

                    if(isset($_POST['search2'])){
                        $n = "%{$_POST['name']}%";
                        $query =  "select * from Pokemon where pname like '$n'";
                    }

                    if(isset($_POST['surprise'])){
                        $first = rand(1,50);
                        $second = rand(51,100);
                        $third = rand(101,151);
                        $query = "select * from Pokemon where PokemonID = $first or PokemonID = $second or PokemonID = $third";
                    }

                    if(!isset($query))
                        $query = "select * from Pokemon where PokemonID = 1 or PokemonID = 4 or PokemonID = 7";

                    $result = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($result);

                    if($numrows == 0){
                    ?>
                        <tr>
                            <td colspan = "8" align = "center"><span class = "STYLE2"> No results find!</td>
                        </tr>
                    <?php
                    }
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                            $pid = $row['PokemonID'];
                            echo "<tr>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['PokemonID']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['pname']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['Hp']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['Attack']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['Defence']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['SAttack']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['SDefence']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'>".$row['Speed']."</td>";
                            echo "<td align = 'left' class = 'STYLE2'><a href='details.php?pid=$pid'>".$row['pname']."</td>";
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
                        <td colspan = "8" align="center" class="STYLE1">Advanced Search</td>
                    </tr>
                    <tr>
                        <td colspan = "2" align="left" class="STYLE3">Type</td>
                        <td colspan = "4" align="center">
                            <select name="type" style="width:90%;">
                                <option value=1>Bug</option>
                                <option value=2>Grass</option>
                                <option value=3>Fire</option>
                                <option value=4>Water</option>
                                <option value=5>Normal</option>
                                <option value=6>Dark</option>
                                <option value=7>Fighting</option>
                                <option value=8>Dragon</option>
                                <option value=9>Electric</option>
                                <option value=10>Fairy</option>
                                <option value=11>Flying</option>
                                <option value=12>Ghost</option>
                                <option value=13>Ground</option>
                                <option value=14>Ice</option>
                                <option value=15>Poison</option>
                                <option value=16>Psychic</option>
                                <option value=17>Rock</option>
                                <option value=18>Steel</option>
                            </select>
                        </td>
                        <td align="left">
                            <input type="submit" name="typesearch" id="typesearch" value="search" style="width:90%"/>
                        </td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan = "2" align="left" class="STYLE3">Weakness</td>
                        <td colspan = "4" align="center">
                            <select name="weakness" style="width:90%;">
                                <option value=1>Bug</option>
                                <option value=2>Grass</option>
                                <option value=3>Fire</option>
                                <option value=4>Water</option>
                                <option value=5>Normal</option>
                                <option value=6>Dark</option>
                                <option value=7>Fighting</option>
                                <option value=8>Dragon</option>
                                <option value=9>Electric</option>
                                <option value=10>Fairy</option>
                                <option value=11>Flying</option>
                                <option value=12>Ghost</option>
                                <option value=13>Ground</option>
                                <option value=14>Ice</option>
                                <option value=15>Poison</option>
                                <option value=16>Psychic</option>
                                <option value=17>Rock</option>
                                <option value=18>Steel</option>
                            </select>
                        </td>
                        <td align="left">
                            <input type="submit" name="weaksearch" id="weaksearch" value="search" style="width:90%"/>
                        </td>
                    </tr>
                    <tr class="blank_row">
                        <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan = "2" align="left" class="STYLE3">Abilities</td>
                        <td colspan = "4" align="center">
                            <select name="abilities" style="width:90%;">
                                <option value=1>Adaptability</option>
                                <option value=2>Aftermath</option>
                                <option value=3>Air Lock</option>
                                <option value=4>Anger Point</option>
                                <option value=5>Anticipation</option>
                                <option value=6>Arena Trap</option>
                                <option value=7>Aura Break</option>
                                <option value=8>Bad Dreams</option>
                                <option value=9>Battery</option>
                                <option value=10>Battle Armor</option>
                                <option value=11>Overgrow</option>
                                <option value=12>Blaze</option>
                                <option value=13>Torrent</option>
                                <option value=14>Shield Dust</option>
                                <option value=15>Shed Skin</option>
                                <option value=16>Compound Eyes</option>
                                <option value=17>Swarm</option>
                                <option value=18>Keen Eye</option>
                                <option value=19>Tangled Feet</option>
                                <option value=20>Run Away</option>
                                <option value=21>Guts</option>
                            </select>
                        </td>
                        <td align="left">
                            <input type="submit" name="absearch" id="absearch" value="search" style="width:90%"/>
                        </td>
                    </tr>
                    <?php
                    if(isset($_GET['type'])){
                        $type = $_GET['type'];
                    }

                    if(isset($_POST['typesearch']))
                        $type = $_POST['type'];

                    if(isset($_POST['weaksearch'])){
                        $weak = $POST['weakness'];
                        $newquery = "select * from Pokemon where PokemonID in (select PokemonID from Hasweakness where TypeID = $weak)";
                    }

                    if(isset($_POST['absearch'])){
                        $ability = $_POST['abilities'];
                        $newquery = "select * from Pokemon where PokemonID in (select PokemonID from Hasabilities where AbilitiesID = $ability)";
                    }

                    if(isset($type))
                        $newquery = "select * from Pokemon where PokemonID in (select PokemonID from Hastype where TypeID = $type)";


                    if(isset($newquery)){
                    ?>
                        <tr>
                            <td width = "11%" algin = "left" class = "STYLE3">Number</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Name</td>
                            <td width = "11%" algin = "left" class = "STYLE3">HP</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Attack</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Defense</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Special Attack</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Special Defense</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Speed</td>
                            <td width = "11%" algin = "left" class = "STYLE3">Details</td>
                        </tr>
                    <?php
                        $newresult = mysqli_query($conn, $newquery);
                        $newnumrows = mysqli_num_rows($newresult);

                        if($newnumrows == 0){
                            ?>
                            <tr>
                                <td colspan = "8" align = "center"><span class = "STYLE2"> No results find! </td>
                            </tr>
                            <?php
                        }
                        else{
                            while($row = mysqli_fetch_assoc($newresult)){
                                $pid = $row['PokemonID'];
                                echo "<tr>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['PokemonID']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['pname']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['Hp']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['Attack']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['Defence']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['SAttack']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['SDefence']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'>".$row['Speed']."</td>";
                                echo "<td align = 'left' class = 'STYLE2'><a href='details.php?pid=$pid'>".$row['pname']."</td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </form>
        </td>
    </tr>

</table>
</body>

</html>
