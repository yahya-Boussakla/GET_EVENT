<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/nav.css">
    <link rel="stylesheet" href="achats.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
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
  
 

    // for ($i=0; $i < count($factureInfo); $i++) {

    //     // if ($i < count($factureInfo)-1) {
            
    //     //     if ($factureInfo[$i]['NUM_FACTURE']==$factureInfo[$i+1]['NUM_FACTURE']) {
    //     //         echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'] . " " . $factureInfo[$i+1]['TYPE'] . " number " . $factureInfo[$i+1]['COUNT(NUM_BILLET)'];
    //     //         echo "</br>";
              
    
    //     //         $i++;
    //     //     }
    //     //     else{
    //     //         echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'];
    //     //         echo "</br>";
    //     //     }
    //     // }
    //     // else{
    //     //     echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'];
    //     // }
    // var_dump($factureInfo[$i]);
    // }
        
    ?>
  <table id="customers">
    <thead>
      <tr>
        <th>Numero Facture</th>
        <th>Date d'Achat</th>
        <th>Qunatite des Billets Normal</th>
        <th>Qunatite des Billets Reduites</th>
        <th>Totale Facture</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($factureInfo as $facture) : ?>
      <tr>
        <td><?=  $facture['NF'] ?></td>
        <td><?=  $facture['DATE_ACHAT'] ?></td>
        <td><?=  $facture['NORMAL'] ?></td>
        <td><?=  $facture['REDUITE'] ?></td>
        <td><?=    $facture['TOTALE']; ?></td>
        <td> <form method="post"> <input type="submit" name="<?= $facture['NF'] ?>"> </form> </td>
        <?php
        if (isset($_POST[$facture['NF']])) {
          echo $facture['NF'];
        }
        ?>
      </tr>
      <?php endforeach ; ?>
    </tbody>

</body>
</html>