<?php 
    session_start(); 
    include 'config.php'; 

    if(!empty($_GET['id'])) { 
    $query_product = mysqli_query($conn, "SELECT * FROM products WHERE id='{$_POST['id']}'"); 
    $result = mysqli_fetch_assoc($query_product); 
    @unlink('upload_image/' . $result['profile_image']); 

    $query = mysqli_query($conn, "DELETE FROM products WHERE id='{$_GET['id']}'") or die('query failed'); 
    mysqli_close($conn); 

    if($query) { 
    $_SESSION['message'] = 'Product Deleted success'; 
    header('location: ' . $base_url . '/index.php'); 
    } else { 
    $_SESSION['message'] = 'Product could not be deleted!'; 
    header('location:' . $base_url . '/index.php'); 
    } 
}