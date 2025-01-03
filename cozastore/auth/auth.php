<?php
session_start();
include("connection.php");
$catAddress = "../dashmin/img/categories/";
$proAddress = "../dashmin/img/products/";

if(isset($_POST['Rgisteration'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $hashPassword = password_hash($password,PASSWORD_DEFAULT);
    $query = $pdo -> prepare("insert into users(user_name,user_email,user_password,user_phone) values (:un,:ue,:up,:upp)");
    $query->bindParam("un",$name);
    $query->bindParam("ue",$email);
    $query->bindParam("up",$hashPassword);
    $query->bindParam("upp",$number);
    $query ->execute();
    echo '<script>alert("account registered Successfully")</script>';


}
// login
if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $pdo ->prepare("select * from users where user_email = :ue");
    $query->bindParam("ue",$email);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    // var_dump($row);
    if(password_verify($password,$row['user_password'])){
       $_SESSION['userId']= $row['user_id'];
       $_SESSION['userName']= $row['user_name'];
       $_SESSION['userEmail']= $row['user_email'];
       $_SESSION['userPassword']= $row['user_password'];
       $_SESSION['userNumber']= $row['user_phone'];
       $_SESSION['userType']= $row['user_role_type'];
if($_SESSION['userType']=="user"){
    echo "<script>
    alert('logged in user successfully');
    location.assign('index.php')
    </script>";
}else{
    echo "<script>
    alert('logged in admin successfully');
    location.assign('../dashmin/index.php');
    </script>";
}
    }
}
?>