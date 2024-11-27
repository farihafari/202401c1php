<?php
$detail =[
    
    
    [
    "name"=>"ali",
    "age"=>23,
    "course"=>"cpism",
    "slot"=>"9 to 11",
    "fee"=>8500
],
[
    "name"=>"alishar",
    "age"=>23,
    "course"=>"cpism",
    "slot"=>"9 to 11",
    "fee"=>8500
],
[
    "name"=>"aliyan",
    "age"=>23,
    "course"=>"cpism",
    "slot"=>"9 to 11",
    "fee"=>8500
],
[
    "name"=>"alishba",
    "age"=>23,
    "course"=>"cpism",
    "slot"=>"9 to 11",
    "fee"=>8500
],
[
    "name"=>"alisha",
    "age"=>23,
    "course"=>"cpism",
    "slot"=>"9 to 11",
    "fee"=>8500
]
];
// echo $detail[1]['name'];
// print_r($detail);
foreach($detail as $index => $values){
    echo $index." : ".$values['name']." <br>";
}
?>