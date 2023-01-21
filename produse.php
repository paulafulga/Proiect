<?php
include("menubar.php");
?>

<link rel="stylesheet" type="text/css" href="produse.css">

<table>
  <tr>
    <th>Nume Produs</th>
    <th>Pretul Produsului</th>
    <th>Cantitatea ramasa din produs</th>
    <th>Imagine cu Produsul</th>
  </tr>
  <?php
  // face conexiunea la baza de date
  $conn = mysqli_connect("localhost", "root", "", "proiect");
  // verifica erori
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // ia produsele din baza de date (cu fetch(?))
  $query = "SELECT dairyproduct_name, dairyproduct_price, dairyproduct_quantity, dairyproduct_image FROM dairy_products";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }
  // le ia pe fiecare in parte ca sa le puna in tabel
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <tr>
      <td><?php echo $row['dairyproduct_name']; ?></td>
      <td><?php echo $row['dairyproduct_price']; ?></td>
      <td><?php echo $row['dairyproduct_quantity']; ?></td>
      <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['dairyproduct_image']); ?>" alt="<?php echo $row['dairyproduct_name']; ?>"></td>
    </tr>
  <?php } ?>
</table>