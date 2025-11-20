<?php
include('backend/database.php');
$pagename = "manage_user";
$pagetab = "manage-user";

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
                    <form id="add-employee-form" enctype="multipart/form-data">

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
                                <th>Designation</th>
                                <th>Hobbies</th>
                                <th>Profile_pic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="list-data">
                            <?php
                            // $limit = 1;
                            // $offset = 0;
                            // if (isset($_GET['limit'])) $limit = $_GET['limit'];
                            // if (isset($_GET['page'])) $offset = ($_GET['page'] - 1) * $limit;
                            ?>
                        </tbody>
                    </table>
                    <div>
                        <?php
                        // $sql = "select count(id) as total from employee";
                        // $result = mysqli_query($conn, $sql);
                        // $result = $result->fetch_assoc();
                        // $totalpages = ceil($result['total'] / $limit);
                        // for ($i = 0; $i < $totalpages; $i++) {
                        // echo '<a href="http://localhost/bantu/manage-user.php?limit=' . $limit . '&&page=' . $i+1 . '">' . $i+1 . '</a>';
                        // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        process()
    })
    $('#add-employee-form').submit(function(e) {
        e.preventDefault();
        const data = new FormData(this);

        $.ajax({
            url: "http://localhost/bantu/backend/add_user.php",
            method: "post",
            data: data,
            contentType: false,
            processData: false,

            success: function(response) {
                let res = JSON.parse(response)
                if (res.success) {
                    process()
                    $('#add-employee-form').trigger('reset');
                    alert('success')
                } else {
                    alert('error')
                }
            },
            error: function() {
                alert('error on backend')
            }
        });
    })
    function process() {
        $('#list-data').empty()
        $.ajax({
            url: "http://localhost/bantu/backend/list_data.php",
            method: "GET",
            success: function(response) {
                let res = JSON.parse(response);
                if (res.success) {
                    let rows = '';
                    res.data.forEach(function(item) {
                        rows += `
                        <tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${item.username}</td>
                        <td>${item.email}</td>
                        <td>${item.password}</td>
                        <td>${item.salary}</td>
                        <td>${item.gender}</td>
                        <td>${item.designation}</td>
                        <td>${item.hobbies}</td>
                        <td><img src="uploads/${item.profile_pic}" width="50"></td>
                        <td><button class="btn btn-success btn-sm update-btn" data-id="${item.id}">Update</button></td>
                            <td><button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Delete</button></td>
                        </tr>`
                    });
                    $('#list-data').append(rows);
                }
                if (res.error) {
                    alert('error');
                }
            },
            error: function() {
                alert('Error in backend');
            }
        })
    }
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/bantu/backend/delete_user.php?id=" + id,
            method: "GET",
            success: function(response) {
                let res = JSON.parse(response)
                if (res.success) {
                  alert(res.message)
                  process();
                }else{
                     alert(res.message)
                }
            },
            error: function() {
                alert('Error deleting product');
            }
        })
    }),
$(document).on('click','.update-btn',function(e){
    e.preventDefault();
      const id2 = $(this).data('id');
        $.ajax({
            url: "http://localhost/bantu/backend/fetchP-data.php?id=" + id2,
            method: "GET",
            success:function(response){
                let res = JSON.parse(response)
                if (res.success){
                    alert('update');
                }
            }
        })
})
     
</script>
<!-- <script>
    $(document).ready(function() {
        gen_table()
    })

    $('#add-product-form').submit(function(e) {
        e.preventDefault()
        const data = new FormData(this)

        $.ajax({
            url: "http://localhost/bantu/backend/add_product.php",
            method: "POST",
            data: data,
            contentType: false,
            processData: false,

            success: function(response) {
                let res = JSON.parse(response)
                if (res.success) {
                    gen_table()
                    $('#add-product-form').trigger('reset');
                    // window.location.href = "http://localhost/bantu/list-product.php"
                }
                if (res.error) {
                    alert('error')
                }
            },
            error: function() {
                alert('error on backend')
            }
        });
    })

    function gen_table(limit = 5, page = 1, search = null) {
        $('#fetch-data tbody').empty()
        $.ajax({
            url: "http://localhost/bantu/backend/gen_table.php?limit=" + limit + "&page=" + page + "&search=" + search,
            method: "GET",
            success: function(response) {
                let res = JSON.parse(response);
                if (res.success) {
                    let rows = '';
                    res.data.forEach(function(item) {
                        rows += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.productname}</td>
                            <td>${item.color}</td>
                            <td>${item.size}</td>
                            <td>${item.quantity}</td>
                            <td>${item.category}</td>
                            <td><img src="uploads/${item.product_pic}" width="50"></td>
                            <td><button class="btn btn-success btn-sm update-btn" data-id="${item.id}">Update</button></td>
                            <td><button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Delete</button></td>
                            </tr>`;
                    });
                    $('#fetch-data tbody').append(rows)

                    let pages = "";
                    for (let index = 0; index < res.pagination.total_pages; index++) {
                        pages += "<button type='button' onclick='gen_table(5," + (index + 1) + ",\"" + search + "\")'>" + (index + 1) + "</button>";
                    }
                    $("#paging").html(pages)
                }
                if (res.error) {
                    alert('error');
                }
            },
            error: function() {
                alert('Error in');
            }
        });
    }
    $("#myfrm").on("submit", function(e) {
        e.preventDefault();
        const search = $("#searchinput").val();
        // gen_table(5,1, search)   
    })
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/bantu/backend/delete_product.php?id=" + id,
            method: "GET",
            success: function(response) {
                let res = JSON.parse(response)
                if (res.success) {
                    alert(res.message);
                    gen_table();
                } else {
                    alert(res.message);
                }
            },
            error: function() {
                alert('Error deleting product');
            }
        })
    })

    $(document).on('click', '.update-btn', function(e) {
        const id2 = $(this).data('id');
        $.ajax({
            url: "http://localhost/bantu/backend/fetch-data.php",
            method: "GET",
            data:{
                id:id2
            },
            success: function(response){
                let res = JSON.parse(response)
                if (res.success) {
                    const p = res.data;
                    $('#update-id').val(p.id);
                    $('#update-name').val(p.productname);
                    $('#update-color').val(p.color);
                    $('#update-size').val(p.size);
                    $('#update-quantity').val(p.quantity);
                    $('#update-category').val(p.category);
                    $('#updateModal').modal('show')
                } else {
                    alert(res.error);
                }
            },
            error: function() {
                alert('error in updating product')
            }
        })
    })
  

    $("#update-form").on('submit',function (e) {
        e.preventDefault();
        const formdata = $(this).serialize();
        console.log("aaaa");
        
        $.ajax({
            url:"./backend/update_product.php",
            method: "POST",
            data:formdata,
            success: function(response){
                let res = JSON.parse(response)
                if(res.success){
                    alert(res.message)
                    $('#updateModal').modal('hide')
                    gen_table()
                }else{
                    alert(res.message)
                }
            }

        })
    })
</script> -->

<!-- BODY END -->

<?php require_once("layout/footer.php") ?>