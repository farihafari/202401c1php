<?php
include("connection.php");
$catImageAddress = 'img/categories/';


// category add

if(isset($_POST['AddCategory'])){
   $name = $_POST['catName'];
   $imageName = $_FILES['catImage']['name'];
   $imageObject = $_FILES['catImage']['tmp_name'];
   $extension = pathinfo($imageName,PATHINFO_EXTENSION);
   $pathDirectory = "img/categories/".$imageName;
   if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){
if(move_uploaded_file($imageObject,$pathDirectory)){
    // prepare query 
    $query = $pdo ->prepare("insert into categories(name,image) values(:pn,:pimg)");
    $query->bindParam("pn",$name);
    $query->bindParam("pimg",$imageName);
    $query->execute();
    echo "<script>alert('data submitted successfully')</script>";
}
   }else{
    echo "<script>alert('invalid file type use only jpeg,png,jpg or webp')</script>";
   }
}

// update cat
if(isset($_POST['UpdateCategory'])){
   $name = $_POST['catName'];
   $id = $_POST['catId'];
   if(!empty($_FILES['catImage']['name'])){
   $imageName = $_FILES['catImage']['name'];
   $imageObject = $_FILES['catImage']['tmp_name'];
   $extension = pathinfo($imageName,PATHINFO_EXTENSION);
   $pathDirectory = "img/categories/".$imageName;
   if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){
if(move_uploaded_file($imageObject,$pathDirectory)){
    // prepare query 
    $query = $pdo ->prepare("update categories set name = :catName, image = :catImage where id = :catId");
    $query->bindParam("catId",$id);
    $query->bindParam("catName",$name);
    $query->bindParam("catImage",$imageName);
    $query->execute();
    echo "<script>alert('data updated successfully')</script>";
}
   }else{
    echo "<script>alert('invalid file type use only jpeg,png,jpg or webp')</script>";
   }
}else{
   $query = $pdo ->prepare("update categories set name = :catName where id = :catId");
   $query->bindParam("catId",$id);
   $query->bindParam("catName",$name);
   $query->execute();
   echo "<script>alert('data updated successfully')</script>";
}
}
// delete cat
if(isset($_POST['DeleteCategory'])){
   $id = $_POST['catId'];
   $query = $pdo ->prepare("delete from categories where id = :catId");
   $query->bindParam("catId",$id);
   $query->execute();
   echo "<script>alert('data deleted successfully')</script>"; 
}
// product

if(isset($_POST['AddProduct'])){
   $proName= $_POST['proName'];
   $proPrice= $_POST['proPrice'];
   $proQuantity= $_POST['proQuantity'];
   $proCatId= $_POST['proCatId'];
   $proDecsription= $_POST['proDescription'];
   $proImage= $_FILES['proImage']['name'];
   $proTmpName = $_FILES['proImage']['tmp_name'];
   $extension = pathinfo($proImage,PATHINFO_EXTENSION);
   $PathAddress ='img/products/'.$proImage;
    if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'webp'){
      if(move_uploaded_file($proTmpName,$PathAddress)){
         $query = $pdo ->prepare("insert into products(productName,productImage,productQuantity,productPrice,productDesciption,productCatId)value(:pn,:pi,:pq,:pp,:pd,:pci)");
         $query ->bindParam("pn",$proName);
         $query ->bindParam("pi",$proImage);
         $query ->bindParam("pq",$proQuantity);
         $query ->bindParam("pp",$proPrice);
         $query ->bindParam("pd",$proDecsription);
         $query ->bindParam("pci",$proCatId);
         $query->execute();
         echo "<script>alert('product Inserted successfully')</script>";

      }else{
         echo "<script>alert('something went wronge')</script>";

      }
    }else{
      echo "<script>alert('invalid Extension')</script>";

    }

}
?>