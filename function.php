<?php

// function user_info()
// {
//     //local variable
//     $name = "faiz";
//     echo $name."<br>";   
  
// }


// // global

// $age = 15;
// $number = "0331245125";
// function user_detail()
// {
//     global $number;
//     global $age;
//     echo $age."<br>".$number;
// }

// user_detail();



function mytest()
{
   static $x = 50;
    
    $x%=45;
    echo $x;
}

mytest();
// echo "<br>";
// mytest();



$num = 10;

if($num!=10)
{
    echo "true";
}

else{
    echo "false";
}


$email = "faiz@gmail.com";
$pass = "root@123";

if($email=="faiz@gmail.com" && $pass=="@123")
{
    echo "<script>
    alert('login successfully');
    </script>";
}

else{
    echo "<script>
    alert('not a login');
    </script>";
}




// call a function

// user_info();
// user_info();
// user_info();
// user_info();

?>