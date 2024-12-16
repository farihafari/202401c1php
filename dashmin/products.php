<?php
include("components/header.php");
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  bg-light rounded mx-0">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary m-3 py-2" data-bs-toggle="modal"
                data-bs-target="#productAdd">Add Product</button>
        </div>
        <div class="col-md-12">
            <h3 class="px-3 py-3">PRODUCT</h3>
            <table class="table">
                <thead>

                    <tr>

                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Product Category</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $query = $pdo->query("SELECT `products`.*, `categories`.`name` 
FROM `products` 
	inner JOIN `categories` ON `products`.`productCatId` = `categories`.`id`;");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows as $keys){
    ?>
                    <tr>
                        <th scope="row"><img src="<?php echo $proImageAddress.$keys['productImage']?>" alt="" srcset=""
                                width="80"></th>
                        <td><?php echo $keys['productName'] ?></td>
                        <td><?php echo $keys['productPrice'] ?></td>
                        <td><?php echo $keys['productQuantity'] ?></td>
                        <td><?php echo $keys['productDesciption'] ?></td>
                        <td><?php echo $keys['name'] ?></td>
                        <td>
                            <a href="" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#updateproduct<?php echo $keys['productId']?>">Edit</a>
                        </td>
                        <td><a href="" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#ModelDelete<?php echo $keys['productId']?>">Delete</a></td>
                    </tr>


                    <!--Update product Modal -->
                    <div class="modal fade" id="updateproduct<?php echo $keys['productId'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="proId" value="<?php echo $keys['productId'] ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" name="proName" value="<?php echo $keys['productName'] ?>" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" name="proPrice" value="<?php echo $keys['productPrice'] ?>" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" name="proQuantity" value="<?php echo $keys['productQuantity'] ?>" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Image</label>
                        <input type="file" name="proImage" class="form-control" id="exampleInputPassword1">
                        <img src="<?php echo $proImageAddress.$keys['productImage']?>" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Description</label>
                        <textarea class="form-control"  name="proDescription" 
                                    id="floatingTextarea" style="height: 150px;"><?php echo $keys['productDesciption'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-3">Product Categories </label>
                        <select class="form-select" id="floatingSelect" name="proCatId" aria-label="Floating label select example">
                            <option hidden>Select Anyone Category</option>
                            <?php
                                    $query = $pdo->query("select * from categories");
                                    $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $catkeys){
                                        ?>
                                         <option value="<?php echo $catkeys['id']?>" <?=$keys['productCatId']==$catkeys['id']?'selected':''?>><?php echo $catkeys['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                          
                        </select>

                    </div>

                    <button type="submit" name="UpdateProduct" class="btn btn-primary">Update Product</button>
                </form>
            </div>

        </div>
    </div>
</div>
                    <!--Update category Modal -->

                    <!-- delete -->
                    <!-- category Modal -->
                    <div class="modal fade" id="ModelDelete<?php echo $keys['productId']?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Products</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="productId" value="<?php echo $keys['productId']?>">

                                        <button type="submit" name="DeleteProduct" class="btn btn-primary">Delete
                                            Products</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--delete category Modal -->
                    <?php
  }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Blank End -->
<!--productAddModal -->
<div class="modal fade" id="productAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" name="proName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" name="proPrice" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" name="proQuantity" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Image</label>
                        <input type="file" name="proImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Description</label>
                        <textarea class="form-control" name="proDescription" 
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pt-3">Product Categories </label>
                        <select class="form-select" id="floatingSelect" name="proCatId" aria-label="Floating label select example">
                            <option hidden>Select Anyone Category</option>
                            <?php
                                    $query = $pdo->query("select * from categories");
                                    $row=$query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $keys){
                                        ?>
                                         <option value="<?php echo $keys['id']?>"><?php echo $keys['name'] ?></option>
                                        <?php
                                    }
                                    ?>
                          
                        </select>

                    </div>

                    <button type="submit" name="AddProduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Add category Modal -->


<?php
include("components/footer.php");
?>
