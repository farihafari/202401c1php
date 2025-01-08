<?php
session_start();
// session_unset();
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
// add to cart
if(isset($_POST['AddToCart'])){
    $pId = $_POST['proId'];
    $pName = $_POST['proName'];
    $pQuantity = $_POST['proQuantity'];
    $pPrice = $_POST['proPrice'];
    $pImage = $_POST['proImage'];
if(isset($_SESSION['cart'])){
    $checkData = false;
foreach($_SESSION['cart'] as $keys => $values){
if($values['proId']==$pId){
   $_SESSION['cart'][$keys]['proQuantity'] +=$pQuantity;
   echo "<script>
   alert('Quantity added');
   </script>";
    $checkData = true;
}
}
if(!$checkData){

        $count = count($_SESSION['cart']);
    //    echo "<script>alert('".$count."')</script>";
    $_SESSION['cart'][$count] =array(
        "proId"=>$pId,
        "proName"=>$pName,
        "proImage"=>$pImage,
        "proPrice"=>$pPrice,
        "proQuantity"=>$pQuantity
    );
    echo "<script>
    alert('product add into cart');
    </script>";
    
}

}else{
    $_SESSION['cart'][0]=array(
                                "proId"=>$pId,
                                "proName"=>$pName,
                                "proImage"=>$pImage,
                                "proPrice"=>$pPrice,
                                "proQuantity"=>$pQuantity
                            );
                            echo "<script>
                            alert('product add into cart');
                            </script>";
}

}
// delete cart item
if(isset($_GET['remove'])){
    $pid = $_GET['remove'];
    foreach($_SESSION['cart'] as $keys => $values){
        if($values['proId']==$pid){
            unset($_SESSION['cart'][$keys]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
            alert('item remove from cart');
            location.assign('shoping-cart.php');
            </script>";
        }
    }
}
?>