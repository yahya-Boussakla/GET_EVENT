<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/nav.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="achats.css">
    <title>GETEVENT</title>
</head>
<body>
    <?php
    session_start();
    include "../includes/nav.php";
    include "../conection/read.php";
    $facture->bindParam(':user', $_SESSION['id']);
    $facture->execute();
    $factureInfo = $facture->fetchALL(PDO::FETCH_ASSOC);
  

        
    ?>
    
  <table id="customers">
    <thead>
      <tr>
        <th>Numero Facture</th>
        <th>Date d'Achat</th>
        <th>Qunatite des Billets Normal</th>
        <th>Qunatite des Billets Reduites</th>
        <th>Totale Facture</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <form method="post">
      <?php foreach($factureInfo as $facture) : ?>
      <tr>
        <td><?=  $facture['NF'] ?></td>
        <td><?=  $facture['DATE_ACHAT'] ?></td>
        <td><?=  $facture['NORMAL'] ?></td>
        <td><?=  $facture['REDUITE'] ?></td>
        <td><?=    $facture['TOTALE']; ?></td>
        <td>  <input type="submit" value="Print" name="<?= $facture['NF'] ?>"> <i class="fa-solid fa-print"></i></td>
        <?php
        if (isset($_POST[$facture['NF']])) {
          include "../includes/facture.php";
          echo "<script src='../includes/facture.js'></script>";
        }
        ?>
      </tr>
      <?php endforeach ; ?>
      </form>
    </tbody>
  </table>

</body>
</html>