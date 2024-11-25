<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Hello, world!</title>
  </head>
  <body>
  
  </body>
</html>



<?php
$a= "php start";
echo "<h1>".$a."</h1>";
?>
<h1>
    <?php echo $a?>
</h1>

<table class="table">
<?php
for($i=1;$i<=10;$i++){
    ?>
    <tr>
    <th scope="row">2</th>
    <td>*</td>
    <td><?php echo $i?></td>
    <td>=</td>
    <td><?php echo $i*2?></td>
</tr>
<?php
}
?>
       
        
   
</table>
