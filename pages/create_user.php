<div class="container py-5">
  <h2>Tambah Data User</h2>
    <form class="mt-4" method="POST">
      <div class="mb-3">
          <label for="name" class="form-label">Full name</label>
          <input name="name" type="text" class="form-control" id="name" required>
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="password" required>
      </div>
      <button type="submit" name="create" class="btn btn-success">Add</button>
    </form>
</div>

<!-- Create data if button clicked -->
<?php 
  if (isset($_POST['create'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $pass   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $createData = mysqli_query($conn, "INSERT INTO user VALUE(NULL, '$name', '$email', '$pass')");
    if ($createData) {
      echo "
      <script>
        alert('Data successfully created');
        document.location.href = '?';
      </script>
      ";
    }else{
      echo "
      <script>
        alert('Data failed created!');
        document.location.href = '?page=create';
        </script>
        ";
      }
  }
?>