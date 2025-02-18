<?php
include "reserve.php";
include "../conection/create.php";
include "../conection/read.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETEVENT</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="reserve.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../includes/nav.css">
</head>
<body>
<?php
    include "../includes/nav.php";
?>
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="modalHeader">
                <h5 class="modal-title" id="alertModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="alertModalMessage">
                <!-- Message will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" id="modalButton" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<main>
    <h1 class="title">
    <?php
    echo $TITLE;
    ?></h1>
    <div class="row">
        <img src="../imgs/green-mask.png" alt="">
        <div class="buy">
            <div class="count">
                <div>
                    <h4 id="day"></h4>
                    <span>D</span>
                </div>
                <div>
                    <h4 id="hour"></h4>
                    <span>H</span>
                </div>
                <div>
                    <h4 id="minute"></h4>
                    <span>M</span>
                </div>
                <div>
                    <h4 id="second"></h4>
                    <span>S</span>
                </div>
            </div>
            <form action="" method="post" id="form"> 
                <div>Tarif Normale <?php echo $normal;?> MAD</div>
                <input type="number" min="0" placeholder="Nombre de Ticket Normale" name="nbNormale">
                <div>Tarif Reduite <?php echo $reduite;?> MAD</div>
                <input type="number" min="0" placeholder="Nombre de Ticket Reduite" name="nbReduite">
                <input type="submit" value="BUY" name="buy">
                <input id="date" hidden value="<?php echo $date;?>">
            </form>
        </div>
    </div>
    <h2>Description</h2>
    <p><?php
    echo $desc;
    ?></p>
</main>
<h2 id="desc">Another Events</h2>
<article>
    <?php
            foreach($Events  as $info):
        ?>
        <div class="card">
            <img src="../imgs/green-mask.png" alt="">
            <div class="cardInformation">
                <h2>
                    <?= $info['TITRE'] ?>
                </h2>
                <div class="time">
                    <img src="../imgs/time.webp" alt="" class="icone">
                    <span>
                        <?= $info['DATE'] ?>
                    </span>
                </div>
                <a 
                <?php
                    echo "href=../reserve/index.php?id=".$info["ID_VERSION"];
                    if ($info["DISPONIBLE"]<=0) {
                        echo " class='finish' >Fermée</a>";
                    }
                    else {
                        echo ">J'ACHÉTE</a>";
                    }
                    
                    ?>
            </div>
            <div class="category">
                <?= $info['CATEGORIE'] ?>
            </div>
        </div>
        <?php endforeach; ?>
</article>
<?php 
if (isset($_GET['message']) && isset($_GET['type'])): 
    $message = htmlspecialchars($_GET['message']);
    $type = $_GET['type'] === 'success' ? 'success' : 'danger'; // Only allow "success" or "danger"
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modalHeader = document.getElementById('modalHeader');
        var modalTitle = document.getElementById('alertModalLabel');
        var modalMessage = document.getElementById('alertModalMessage');
        var modalButton = document.getElementById('modalButton');

        if ("<?= $type ?>" === "success") {
            modalHeader.className = "modal-header bg-success text-white";
            modalTitle.innerText = "Success";
            modalButton.className = "btn btn-success";
        } else {
            modalHeader.className = "modal-header bg-danger text-white";
            modalTitle.innerText = "Error";
            modalButton.className = "btn btn-danger";
        }

        modalMessage.innerText = "<?= $message ?>";

        var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
        alertModal.show();
    });
</script>
<?php endif; ?>

<script src="reserve.js"></script>

</body>
</html>