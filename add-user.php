<?php
include('backend/database.php');
$pagename = "add_user";
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
    if (isset($_GET['err']) && $_GET['err'] == "already exist") {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Account!</strong> already exist.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Add Employee</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form method="POST" action="backend/calls.php" enctype="multipart/form-data">

                        <div class="form-group row d-none">
                            <label class="col-sm-2 col-form-label">action</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="action" value="add-user" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input
                                    type="email" class="form-control" name="email" />
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input
                                    type="password" class="form-control" name="password" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Select Salary:</label>
                            <div class="col-sm-2">
                                <input
                                    type="range" class="form-control" name="salary" min="60000" max="120000" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender:</label>
                            <div class="col-sm-2">
                                <input type="radio" name="gender" value="male" required>Male &nbsp; &nbsp;
                                <input type="radio" name="gender" value="female" required>Female
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hobbies:</label>
                            <div class="col-sm-2">
                                <label><input type="checkbox" name="hobbies[]" value="reading">Reading</label>
                                <label><input type="checkbox" name="hobbies[]" value="sports">Sports</label>
                                <label><input type="checkbox" name="hobbies[]" value="gaming">Gaming</label>
                                <label><input type="checkbox" name="hobbies[]" value="traveling">Traveling</label>
                                <label><input type="checkbox" name="hobbies[]" value="music">Music</label>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Designation</label>
                            <div class="col-sm-10">
                                <select name="designation" class="form-control" required>
                                    <option value="">-- Select Designation --</option>
                                    <option value="manager">Manager</option>
                                    <option value="teamleader">Team Leader</option>
                                    <option value="employee">Employee</option>
                                    <option value="intern">Intern/Trainee</option>
                                </select>
                            </div>
                        </div>


                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profile</label>
                            <div class="col-sm-10">
                                <input
                                    type="file" class="form-control" name="profile_pic" accept="image/*" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white btn-sm" type="submit">
                                    Cancel
                                </button>
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Add User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- BODY END -->

<?php require_once("layout/footer.php") ?>