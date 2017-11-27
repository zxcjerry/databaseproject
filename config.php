<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 11/20/17
 * Time: 11:36 AM
 */
    error_reporting(E_ERROR);
    $conn = mysqli_connect('mpcs53001.cs.uchicago.edu', 'jingjiew', 'wjj123456', jingjiewDB);
    if(!$conn) {
        echo "Cannot configures mysql database";
        die();
    }
