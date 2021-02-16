<?php 
  $id = $_GET['id'];
  $getDataWhereId = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
  $user = mysqli_fetch_assoc($getDataWhereId);
?>
<div class="container py-4 text-center">
  <h4>Hapus data user berikut ini?</h4>
  <br>
  <div>Nama: <?= $user['name'] ?></div>
  <div>Email: <?= $user['email'] ?></div>
  <br>
  <form method="POST">
    <button type="submit" name="delete" class="btn btn-success">OK</button>
    <a href="?" class="btn btn-danger">BATAL</a>
  </form>
</div>

<?php 
  if (isset($_POST['delete'])) {
    $deleteData = mysqli_query($conn, "DELETE FROM user WHERE id='$id'");
    if ($deleteData) {
      echo "
      <script>
        alert('Data successfully deleted');
        document.location.href = '?';
      </script>
      ";
    }else{
      echo "
      <script>
        alert('Data failed deleted!');
        document.location.href = '?';
      </script>
      ";
    }
  }
?>