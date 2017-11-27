<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/20/17
 * Time: 4:41 PM
 */

include ('config.php');

if(mysqli_connect_errno()){
    echo "MySQLi Connection was not established: " . mysqli_connect_error();
}

    session_start();
    if(isset($_SESSION['user'])){
        echo "<script> window.location = 'home.php';</script>";
    }
    else
    { ?>
    <html>
    <title> Register </title>
    <form action="" method="post">
    <table width="799" height="200" border="0" align="center" cellpadding="5" cellspacing="0" class="bk">
        <tr>
            <td colspan="4"><img src="img/banner.jpg" width="799" height="120" /></td>
        </tr>
        <tr>
            <td> Username </td>
            <td> <input type="text" name="user"  title="username"></td>
            <td> (less than 20 characters) </td>
        </tr>
        <tr>
            <td> Password </td>
            <td> <input type="password" name="pass" title="password"></td>
            <td> (more than 6 characters)</td>
        </tr>
        <tr>
            <td> Verify Password </td>
            <td> <input type="password" name="pass2" title="password2"></td>
        </tr>
        <tr>
            <td> Full Name </td>
            <td> <input type = "text" name = "full" title="Full"></td>
        </tr>
        <tr>
            <td> <input type="submit" name="register"  value="Register"></td>
        </tr>
    </table>
    </form>
    </html>
<?php
    }
    if(isset($_POST['register'])){
        $pass_1 = $_POST['pass'];
        $pass_2 = $_POST['pass2'];
        $user = $_POST['user'];
        $full = $_POST['full'];
        if($pass_1 != $pass_2){
            echo "<script> alert('Password does not match'); </script>";
        }
        else if(strlen($pass_1) < 6){
            echo "<script> alert('Password too short'); </script>";
        }
        else if(strlen($user) > 20){
            echo "<script> alert('Username too long'); </script>";
        }
        else if(empty($full)){
            echo "<script> alert('Full name can not be empty); </script>";
        }
        else {
            $sql = "select * from Trainers where Acc = '$user'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num != 0)
                echo "<script> alert('Invalid Username'); </script>";
            else{
                $sql = "select max(TrainerID) as m from Trainers";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $id = $row['m'] + 1;
                $sql = "insert into Trainers (TrainerID, Trainername, Money, Acc, Pword) value ($id, '$full',0, '$user', '$pass_1')";
                if(mysqli_query($conn, $sql)){
                    echo "<script> alert('Create account successfully'); </script>";
                    echo "<script> window.location = 'home.php';</script>";
                }
                else{
                    echo "<script> alert('Create account failed'); </script>";
                }
            }
        }


    }

?>
