<?php 
  $id = $_GET['id'];
  $getDataWhereId = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
  $data = mysqli_fetch_assoc($getDataWhereId);
?>
<div class="container py-5">
  <h2>Update Data User</h2>
    <form class="mt-4" method="POST">
      <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input name="name" type="text" class="form-control" value="<?= $data['name']; ?>" id="name" required>
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" value="<?= $data['email']; ?>" id="email" required>
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Current password</label>
          <input name="current" type="password" class="form-control" id="current">
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">New password</label>
          <input name="pass1" type="password" class="form-control" id="pass1">
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Repeat password</label>
          <input name="pass2" type="password" class="form-control" id="pass2">
      </div>
      <button type="submit" name="update" class="btn btn-success">Simpan</button>
    </form>
</div>

<?php 
  if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $current_pass = $_POST['current'];
    $new_pass     = $_POST['pass1'];
    $repeat_pass  = $_POST['pass2'];

    if ($current_pass == "") {
      $update = mysqli_query($conn, "UPDATE user SET name='$name', email='$email' WHERE id='$id'");
      if ($update) {
        echo "
        <script>
          alert('Account successfully updated');
          document.location.href = '?';
        </script>
        ";
      }
    }

    if (!password_verify($current_pass, $data['password'])) {
      echo "
        <script>
          alert('Wrong current password!');
          document.location.href = '?page=update&id=$id';
        </script>
      ";
    }elseif ($new_pass == $current_pass) {
      echo "
        <script>
          alert('Password cannot be same current password!');
          document.location.href = '?page=update&id=$id';
        </script>
      ";
    }elseif($repeat_pass != $new_pass || $new_pass != $repeat_pass) {
      echo "
        <script>
          alert('Repeat or new password must be same');
          document.location.href = '?page=update&id=$id';
        </script>
      ";
    }else {
      $hash_password = password_hash($new_pass, PASSWORD_DEFAULT);
      $updateData    = mysqli_query($conn, "UPDATE user SET name='$name', email='$email',
                                    password='$hash_password' WHERE id='$id'");
      if ($updateData) {
        echo "
        <script>
          alert('Account and password successfully updated');
          document.location.href = '?';
        </script>
        ";
      }else{
        echo "
        <script>
          alert('Data failed update!');
          document.location.href = '?page=update&id=$id';
        </script>
        ";
      }
    }
  }
?>