<form action="index.php" method="post">
  <input type="submit" name="redirect" value="Mergeti catre pagina principala">
</form>
<!-- buton pentru pagina de sign up -->
<?php
if(isset($_POST['redirect'])) {
  header("Location: index.php");
  exit;
}
?>