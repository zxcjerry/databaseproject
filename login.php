<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/20/17
 * Time: 3:00 PM
 */
include ('config.php');

if(mysqli_connect_errno()){
    echo "MySQLi Connection was not established: " . mysqli_connect_error();
}

    session_start();

    if(isset($_SESSION['user']))
    {
        echo "Hello ";
        echo $_SESSION['user'];
        echo "<a href='logout.php'> Logout </a>";
    }
    else{ ?>
        <html>

        <body>

        <form action="" method="post">
            <table width="200" border="0">
                <tr>
                    <td> Username</td>
                    <td> <input type="text" name="user"  title="username"></td>
                    <td> Password</td>
                    <td> <input type="password" name="pass" title="password"></td>
                    <td> <input type="submit" name="login"  value="Login"></td>
                    <td> <input type="submit" name="reg"  value="Register"></td>
                    <td></td>
                </tr>
            </table>
        </form>

        </body>
        </html>

<?php
    }
    if(isset($_POST['login']))
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sel_sql = "select * from Trainers where Acc = '$user' and Pword = '$pass'";
        $run_sql = mysqli_query($conn, $sel_sql);
        $che_sql = mysqli_num_rows($run_sql);


        if($che_sql > 0)
        {
            $row = mysqli_fetch_assoc($run_sql);

            $_SESSION['user']=$row['Trainername'];
            $_SESSION['userID'] = $row['TrainerID'];

            echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            //  On Successful Login redirects to home.php

        }
        else
        {
            echo "<script>";
            echo "alert('Invalid username or password');";
            echo "window.location = 'home.php';";
            echo "</script>";
        }
    }
    if(isset($_POST['reg']))
    {
        echo "<script> window.location = 'register.php';</script>";
    }

?>
