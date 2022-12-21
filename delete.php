<?php
require 'config.php';
$id = $_GET['id'];
$sql = 'DELETE FROM employees WHERE id=:id';
$statement = $db->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}