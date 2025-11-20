<?php
include('backend/database.php');

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
  
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Employee's List</h5>
                    <form method="get" action="">
                        <div class="ibox-tools">
                           <div class="input-group">
                                <input type="hidden" name="limit" value="5">
                                <input type="hidden" name="page" value="1">
                                <input type="text" class="form-control form-control-sm" name="search" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $limit = 5;
                          $offset = 0;
                          if(isset($_GET['limit'])) $limit = $_GET['limit'];
                          if(isset($_GET['page'])) $offset = ($_GET['page'] - 1) * $limit;
                          if(isset($_GET['search'])){
                            $search = $_GET['search'];
                            $sql = "select * from product where productname like '%$search%'
                                OR color LIKE '%$search%' 
                                OR size LIKE '%$search%' 
                                OR quantity LIKE '%$search%' 
                                OR category LIKE '%$search%'
                                limit $limit offset $offset";
                          }else{
                            $sql = "select * from product limit $limit offset $offset";
                          }
                          
                          $result = mysqli_query($conn,$sql);
                          if(mysqli_num_rows($result))
                          while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['productname'] . "</td>";
                            echo "<td>" . $row['color'] . "</td>";
                            echo "<td>" . $row['size'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . "<a href='edit-product.php?id=" . $row['id'] .  "'>Update</a>" . "</td>";
                            echo "<td>" . "<a href='backend/delete_product.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>" . "</td>";
                            echo "</tr>";
                          }
                          ?>
                        </tbody>
                    </table>
                    <?php
                    $sql = str_replace("limit $limit offset $offset", "",$sql) ;
                    $result = mysqli_query($conn,$sql);
                    $count = $result->num_rows;
                    $result = $result->fetch_assoc();
                    $totalpages = ceil($count / $limit);
                 
                    for($i =1; $i <=$totalpages; $i++){
                        echo  '<a href="http://localhost/bantu/practice.php?limit=' . $limit . '&page=' . $i . (isset($_GET['search']) ? "&search=" . $_GET['search'] : "") . '"> ' . $i . '</a>';
                    }

                    ?>
     
                </div>
            </div>
        </div>

    </div>
</div>

<!-- BODY END -->

<?php require_once("layout/footer.php") ?>