<?php
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

?>