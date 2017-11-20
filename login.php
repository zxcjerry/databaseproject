<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/20/17
 * Time: 3:00 PM
 */
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

        if($user == "Ank" && $pass == "1234")
        {

            $_SESSION['user']=$user;

            echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            //  On Successful Login redirects to home.php

        }
        else
        {
            echo "invalid UserName or Password";
        }
    }
?>
