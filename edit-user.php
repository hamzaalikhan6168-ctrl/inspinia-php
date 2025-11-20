<?php
include('backend/database.php');
$pagename = "edit_user";
$pagetab = "users";

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
if (isset($_GET['msg']) && $_GET['msg'] == "updated") {
  echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Update!</strong> has been done.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
if (isset($_GET['err']) && $_GET['err'] == "update_failed") {
  echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Update!</strong> failed.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
if (isset($_GET['err']) && $_GET['err'] == "nochange") {
  echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Account!</strong> already exist.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$data = "SELECT * FROM `employee` WHERE `id` = $id";
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
            <h5>Update Employee</h5>
        </div>
        <div class="ibox-content">
            <form action="backend/calls.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?? ''; ?>">
                <input type="hidden"  name="action" value="edit-user">


                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" value="" >
                </div>

                <div class="form-group">
                    <label>Salary:</label>
                    <input type="number" name="salary" class="form-control" value="<?php echo isset($data['salary']) ? $data['salary'] : '';?>" >
                </div>

                <div class="form-group">
                    <label>Profile Pic:</label>
                    <input type="file" name="profile_pic" class="form-control" value="" >
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


