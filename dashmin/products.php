<?php
include("components/header.php");
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">

    <div class="row  bg-light rounded mx-0">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary m-3 py-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Category</button>
        </div>
        <div class="col-md-12">
            <h3 class="px-3 py-3">CATEGORIES</h3>
            <table class="table">
                <thead>

                    <tr>

                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    $query = $pdo->query("select * from categories");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows as $keys){
    ?>
 <tr>
                        <th scope="row"><img src="<?php echo $catImageAddress.$keys['image']?>" alt="" srcset=""  width="80"></th>
                        <td><?php echo $keys['name'] ?></td>
                        <td>
                            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModelUpdate<?php echo $keys['id']?>">Edit</a>
                        </td>
                        <td><a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModelDelete<?php echo $keys['id']?>">Delete</a></td>
                    </tr>


                    <!--Update category Modal -->
<div class="modal fade" id="ModelUpdate<?php echo $keys['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="catId" value="<?php echo $keys['id']?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" name="catName" value="<?php echo $keys['name']?>" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Image</label>
                        <input type="file" name="catImage" class="form-control " id="exampleInputPassword1">
                        <img class="mt-3" src="<?php echo  $catImageAddress.$keys['image']?>" width="90" alt="">
                    </div>

                    <button type="submit" name="UpdateCategory" class="btn btn-primary">Update Category</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Update category Modal -->

<!-- delete -->
 <!-- category Modal -->
<div class="modal fade" id="ModelDelete<?php echo $keys['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                   
                <input type="hidden" name="catId" value="<?php echo $keys['id']?>">

                    <button type="submit" name="DeleteCategory" class="btn btn-primary">Delete Category</button>
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
<!--Add category Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" name="catName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" name="catName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" name="catName" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Image</label>
                        <input type="file" name="catImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product   <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             
                    </div>

                    <button type="submit" name="AddCategory" class="btn btn-primary">Add Category</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!--Add category Modal -->


<?php
include("components/footer.php");
?>