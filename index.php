<?php 
require 'config.php';
$sql = 'SELECT *FROM employees';
$statement = $db->prepare($sql);
$statement->execute();
$employees = $statement->fetchAll();
?>

<?php require 'header.php'; ?>
<div class="container">
 <div class="card mt-5">
   <div class="card-header"> 
     <h2>All people</h2>
   </div>

   <div class="card-body">
    <table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Salary</th>
    <th>Action</th>
</tr>
<?php foreach($employees as $person=>$data ):?>
<tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['Name']; ?></td>
    <td><?php echo $data['Address']; ?></td>
    <td><?php echo $data['Salary']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
    </td>
</tr>
<?php endforeach;?>
    </table>
</div>
<?php require 'footer.php'; ?>