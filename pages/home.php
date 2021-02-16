
<!-- do anything here! -->
<div class="container py-4">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Password</th>
          <th>Kelola</th>
        </tr>
      </thead>
      <?php 
        $i = 1;
        $getData = mysqli_query($conn, "SELECT * FROM user ORDER BY id ASC");
      ?>
      <?php if(mysqli_num_rows($getData) == 0) : ?>
        <tr>
            <td colspan="5" class="text-center">Tidak ada data</td>
        </tr>
      <?php endif; ?>
      <?php while($data = mysqli_fetch_assoc($getData)) : ?>
        <tbody>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['password'] ?></td>
            <td>
                <a href="?page=update&id=<?= $data['id']; ?>" class="btn btn-sm btn-success">Update</a>
                <a href="?page=delete&id=<?= $data['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        </tbody>
      <?php endwhile; ?>
    </table>
  </div>
</div>