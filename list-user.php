<?php
include('backend/database.php');
$pagename = "list_user";
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
<?php
if (isset($_GET['err']) && $_GET['err'] == 'deleted')
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Record!</strong> Deleted Successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
if (isset($_GET['msg']) && $_GET['msg'] == 'updated')
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Update!</strong> Update Successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Employee's List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Salary</th>
                                <th>Gender</th>
                                <th>Hobbies</th>
                                <th>Designation</th>
                                <th>Profile_pic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                            $limit = 1;
                            $offset = 0;
                            if (isset($_GET['limit'])) $limit = $_GET['limit'];
                            if (isset($_GET['page'])) $offset = ($_GET['page'] - 1) * $limit;


                            $sql = "SELECT * FROM employee limit $limit offset $offset";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    echo "<td>" . ucfirst($row['gender']) . "</td>";
                                    echo "<td>" . $row['hobbies'] . "</td>";
                                    echo "<td>" . ucfirst($row['designation']) . "</td>";
                                    echo "<td><img src='uploads/" . $row['profile_pic'] . "' width='50'></td>";
                                    echo "<td>" . "<a href='edit-user.php?id=" . $row['id'] . "'>Update</a>" . "</td>";
                                    echo "<td>" . "<a href='backend/calls.php?action=delete-user&id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\" >Delete</a>" . "</td>";
                                    echo "</td>";
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                    <div>
                        <?php
                        $sql = "select count(id) as total from employee";
                        $result = mysqli_query($conn, $sql);
                        $result = $result->fetch_assoc();
                        $totalpages = ceil($result['total'] / $limit);
                        for ($i = 0; $i < $totalpages; $i++) {
                            echo '<a href="http://localhost/bantu/list-user.php?limit=' . $limit . '&&page=' . $i+1 . '">' . $i+1 . '</a>';
                        }

                        ?>

                        <!-- <a href="http://localhost/bantu/list-user.php?limit=2&&page=2">2</a>
                        <a href="http://localhost/bantu/list-user.php?limit=2&&page=3">3</a> -->
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- BODY END -->

<?php require_once("layout/footer.php") ?>