<?php
require 'config.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM employees WHERE id=:id';
$statement = $db->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['Name'])  && isset($_POST['Address']) && isset($_POST['Salary'])) {
  $Name = $_POST['Name'];
  $Address = $_POST['Address'];
  $Salary = $_POST['Salary'];
  $sql = 'UPDATE employees SET name=:name, address=:address, salary=:salary WHERE id=:id';
  $statement = $db->prepare($sql);
  if ($statement->execute([':name' => $name, ':address' => $address, ':salary' =>$salary, ':id' => $id])) {
    header("Location: /");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->Name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">address</label>
          <input type="text" value="<?= $person->Address; ?>" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <label for="salary">salary</label>
          <input type="number" value="<?= $person->Salary; ?>" name="salary" id="salary" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>