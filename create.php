<?php
require 'config.php';
$message='';
if (isset ($_POST['name']) &&isset($_POST['address']) &&isset($_POST['salary'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $sql = 'INSERT INTO employees(name, address, salary) VALUES(:name, :address, :salary)';
    $statement = $db->prepare($sql);
    if ($statement->execute ([':name' => $name, ':address' => $address, ':salary' => $salary])){
        $message = 'data inserted successfully';
    }
}
?>
<?php require 'header.php';?>
<div class="container">
 <div class="card mt-5">
   <div class="card-header"> 
     <h2>Create a person</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
          <label for="salary">Salary</label>
          <input type="number" name="salary" id="salary" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
     </form>
   </div>
 </div>
</div>
<?php require 'footer.php';?>