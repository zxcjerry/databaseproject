<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/20/17
 * Time: 3:03 PM
 */
    session_start();
    session_destroy();
    echo "<script>";
    echo "alert('Logout successfully');";
    echo "window.location = 'home.php';";
    echo "</script>";
