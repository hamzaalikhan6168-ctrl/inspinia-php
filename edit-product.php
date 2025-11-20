<?php
include('backend/database.php');
$pagename = "edit_product";
$pagetab = "product";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<?php require_once("layout/header.php") ?>
<?php require_once("layout/sidebar.php") ?>
<?php require_once("layout/navbar.php") ?>

<!-- BODY -->
          <div class="wrapper wrapper-content">
    <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$data = "SELECT * FROM `product` WHERE `id` = $id";
$dataresult=mysqli_query($conn,$data);
$data=$dataresult->fetch_assoc();
}else{
    $data = [];
}
?>

    <!-- <div class="row"> -->
       <div class="wrapper wrapper-content d-flex justify-content-center">
    <div class="ibox w-50 shadow-sm" style="border-radius:15px;">
        <div class="ibox-title text-center bg-primary text-white rounded-top">
            <h5>Update Product</h5>
        </div>
        <div class="ibox-content">
            <form action="backend/edit_product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?? ''; ?>">

                <div class="form-group">
                    <label>Product Name:</label>
                    <input type="text" name="productname" class="form-control" value="<?php echo isset($data['productname']) ? $data['productname'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Color:</label>
                    <input type="text" name="color" class="form-control" value="<?php echo isset($data['color']) ? $data['color'] : ''; ?>" required>
                </div>

           <div class="form-group">
                    <label>Size:</label>
                      <select name="size" class="form-control" required>
                                    <option value="small"<?php if(isset($data['size']) && $data['size']=='small') echo 'selected'; ?>>Small</option>
                                    <option value="women"<?php if(isset($data['size']) && $data['size']=='medium') echo 'selected'; ?>>Medium</option>
                                    <option value="kids"<?php if(isset($data['size']) && $data['size']=='large') echo 'selected'; ?>>Large</option>
                                    <option value="kids"<?php if(isset($data['size']) && $data['size']=='extra large') echo 'selected'; ?>>Extra Large</option>
                                </select>
                </div>

                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="number" name="quantity" class="form-control" value="<?php echo isset($data['quantity']) ? $data['quantity'] : '';?>" >
                </div>

                <div class="form-group">
                    <label>Category:</label>
                      <select name="category" class="form-control" required>
                                    <option value="man"<?php if(isset($data['category']) && $data['category']=='man') echo 'selected'; ?>>Man</option>
                                    <option value="women"<?php if(isset($data['category']) && $data['category']=='women') echo 'selected'; ?>>Women</option>
                                    <option value="kids"<?php if(isset($data['category']) && $data['category']=='kids') echo 'selected'; ?>>Kids</option>
                                </select>
                </div>

             

                <div class="form-group text-center mt-4">
                    <button type="submit" name="update" class="btn btn-success px-4">Update</button>
                    <a href="list_user.php" class="btn btn-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>

            <!-- BODY END -->

<?php require_once("layout/footer.php") ?>


