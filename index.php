<?php include('layouts/header.php') ?>
<?php include('layouts/navbar.php') ?>
<?php include('DB/connection.php') ?>
<?php 
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
      case 'create':
        include('pages/create_user.php');
        break;
      case 'update':
        include('pages/update_user.php');
        break;
      case 'delete':
        include('pages/delete_user.php');
        break;
      
      default:
        echo "<h5>Tidak ada halaman</h5>";
        break;
    }
  }else{
    include('pages/home.php');
  }
?>
<?php include('layouts/footer.php') ?>