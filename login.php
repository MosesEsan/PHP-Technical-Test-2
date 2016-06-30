<?php
/**
 * Created by PhpStorm.
 * User: mosesesan
 * Date: 16/01/15
 * Time: 13:25
 */

$servername = "localhost";
$dbUserName = "moses";
$dbPassword = "esan";
$dbName = "LSI";


if (isset($_POST['submit']))
{
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is empty";
    }else{

        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        // Create connection
        $conn = mysqli_connect($servername, $dbUserName, $dbPassword, $dbName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else{

            $sql = "SELECT UserType.value FROM User INNER JOIN UserType On User.userTypeID = UserType.userTypeID WHERE login = '".$username."' && password = '".$password."'";

            if (mysqli_num_rows($result) > 0)
            {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "id: " . $row["value"];
                }
            } else {
                echo "Username or Password is invalid";
            }



        }
    }
}else{
    echo "Error No Data Passed";
}

?>