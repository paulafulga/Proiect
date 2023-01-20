<form action="index.php" method="post">
  <input type="submit" name="redirect" value="Go to Index">
</form>

<?php
if(isset($_POST['redirect'])) {
  header("Location: index.php");
  exit;
}
?>