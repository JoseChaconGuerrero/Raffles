<div class="chat">
    <?php if (isset($_SESSION["id"]) && $_SESSION["cargoAdm"] == 1) {
    ?>
      <a href="../admin/rifas.php"><svg class="im">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu"></use>
        </svg></a>
    <?php
    } ?>
    <a href="../servi/index.php" target="_blank"><svg class="im">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chat"></use>
      </svg></a>


    <a href="https://wa.me/584247774539" target="_blank"><svg class="im">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#whatsapp"></use>
      </svg></a>
  </div>