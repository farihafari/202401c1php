
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">course</th>
                <th scope="col">slot</th>
                <th scope="col">fees</th>
            </tr>
        </thead>
        <tbody>
        <?php
$std = [
["ali","cpism","9 to 11",8500],
["alishar","cpism","9 to 11",8500],
["aliyan","cpism","9 to 11",8500],
["alishba","cpism","9 to 11",8500],
["alisha","cpism","9 to 11",8500],
["ali raza","cpism","9 to 11",8500],
];
for($i=0; $i<count($std);$i++){
   ?>
   <tr>
    <?php
    for($j=0;$j<count($std[$i]);$j++){
        ?>
        <td><?php echo $std[$i][$j]?></td>
        <?php
    }
    ?>
   </tr>
   <?php 
}
?>
    
            
         
        </tbody>
    </table>
    
</body>
</html>