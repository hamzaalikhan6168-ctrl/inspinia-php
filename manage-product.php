<?php
include('backend/database.php');
$pagetab = "manage-product";
$pagename = "manage-product";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<?php require_once("layout/header.php") ?>
<?php require_once("layout/sidebar.php") ?>
<?php require_once("layout/navbar.php") ?>


<div class="wrapper wrapper-content">
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == "added") {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Product!</strong> added.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    if (isset($_GET['err']) && $_GET['err'] == 'deleted')
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Record!</strong> Are you sure you want to delete this record?.
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
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Add Product</h5>
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
                    <form id="add-product-form" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="productname" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <input
                                    type="text" class="form-control" name="color" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <select name="size" class="form-control" required>
                                    <option value="">-- Size --</option>
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                    <option value="extra large">Extra Large</option>
                                </select>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input
                                    type="number" class="form-control" name="quantity" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control" required>
                                    <option value="">-- Category --</option>
                                    <option value="man">Man</option>
                                    <option value="women">Women</option>
                                    <option value="kids">Kids</option>
                                </select>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input
                                    type="file" class="form-control" name="product_pic" accept="image/*" />
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white btn-sm" type="submit">
                                    Cancel
                                </button>
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Product List</h5>
                    <form method="get" id="myfrm">
                        <div class="ibox-tools">
                            <div class="input-group">
                                <input type="hidden" name="limit" value="5">
                                <input type="hidden" name="page" value="1">
                                <input type="text" id="searchinput" class="form-control form-control-sm" name="search" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered" id="fetch-data">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Product_Pic</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div id="paging">

                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Product</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form">
                                <input type="hidden" id="update-id" name="id">

                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" id="update-name" name="productname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" id="update-color" name="color" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" id="update-size" name="size" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" id="update-quantity" name="quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" id="update-category" name="category" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary w-100" >Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
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
            url: "http://localhost/bantu/backend/fetch-data.php?id=" + id2,
            method: "GET",
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
</script>





<!-- BODY END -->

<?php require_once("layout/footer.php") ?>