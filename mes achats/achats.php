<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/nav.css">
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
    $array = []; 
    echo"<pre>"; 
    var_dump($factureInfo);
    echo"</pre>";
    // foreach($factureInfo as $info){
        // array_push($array,$id['NUM_FACTURE']);

    // }
    // print_r(array_unique($array));
    // foreach(array_unique($array) as $num){
    //     if () {
    //         # code...
    //     }
    // }

    for ($i=0; $i < count($factureInfo); $i++) {
        if ($i < count($factureInfo)-1) {
            
            if ($factureInfo[$i]['NUM_FACTURE']==$factureInfo[$i+1]['NUM_FACTURE']) {
                echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'] . " " . $factureInfo[$i+1]['TYPE'] . " number " . $factureInfo[$i+1]['COUNT(NUM_BILLET)'];
                echo "</br>";
                // echo $i;
    
                $i++;
            }
            else{
                echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'];
                echo "</br>";
            }
        }
        else{
            echo $factureInfo[$i]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$i]['TYPE'] . " number " . $factureInfo[$i]['COUNT(NUM_BILLET)'];
        }
        // for ($j=$i+1; $j < ($i+2); $j++) { 
            // else{
            //     // echo $factureInfo[$j]['NUM_FACTURE'] . " FACTURE " . $factureInfo[$j]['TYPE'] . " number ";
            //     echo "hh";
            //     echo "</br>";
            // }
            // print_r($factureInfo[$i]['NUM_FACTURE']);
            // echo "</br>";
            // print_r($factureInfo[$j]['NUM_FACTURE']);
            // echo "</br>";
            
        // }
    }
        
    ?>


</body>
</html>