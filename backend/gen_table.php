<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $limit = 5;
    $offset = 1;
    $search = $_GET['search'];
    if (isset($_GET['limit'])) $limit = $_GET['limit'];
    if (isset($_GET['page'])) $offset = ($_GET['page'] - 1) * $limit;
    if($search !== "null"){
    $sql = "SELECT * FROM product 
            WHERE 
            productname LIKE '%$search%' 
            OR color LIKE '%$search%' 
            OR size LIKE '%$search%' 
            OR quantity LIKE '%$search%' 
            OR category LIKE '%$search%' 
        limit $limit offset $offset";
    }else{
         $sql = "SELECT * FROM product  limit $limit offset $offset";
    }
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = str_replace("limit $limit offset $offset", "", $sql);
    $result2 = mysqli_query($conn, $sql);
    $count = $result2->num_rows;
    $result2 = $result2->fetch_assoc();
    $totalpages = ceil($count / $limit);
    $pagination= [ 
        "current_page" => (int)$_GET['page'],
        "limit" => (int)$_GET['limit'],
        "total_results" => $count,
        "total_pages" => $totalpages
    ];
    echo json_encode(['success' => true, 'data' => $result, 'pagination'=> $pagination]);
}
