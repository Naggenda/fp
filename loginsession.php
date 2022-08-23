<?php
include './php-dashboard-master/pages/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '".$email."' AND  lpassword = '".$password."' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row["usertype"] == 'user'){
        header('Location: ./farmer-dashboard/index.php');
    }
    elseif($row['usertype'] == 'admin'){
        header('Location: ./php-dashboard-master/index.php');
    }
    elseif($row['usertype'] == 'Doctor'){
        header('Location: ./doctor-dashboard/index.php');
    }
    else{
        echo 'email or password incorrect';
    }
}

?>
