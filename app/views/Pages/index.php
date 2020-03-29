<?php require APPROOT . '/views/inc/header.php';?>
<div class="jumbotron jumbotron-flud text-center bg-warning">
    <div class="container">
    <h1 class="display-4"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    </div>
  </div> 
  <div id="showgrid">
  <div class="color">
  <div class="row">
    <div class="column" title="Lemon"><a href="<?php echo URLROOT ?>pages/lemon/"> <img src="public/img/fruit/lemon.jpg" alt="Lemon" ></a></div>
    <div class="column" title="Orange"><a href="<?php echo URLROOT ?>pages/orange"><img src="public/img/fruit/orange.jpg" alt="Orange" ></a></div>
    <div class="column" title="Banana"><a href="<?php echo URLROOT ?>pages/banana"><img src="public/img/fruit/banana.jpg" alt="Banana" ></a></div>
  </div>
</div>
<div class="color">
  <div class="row">
    <div class="column" title="Apple"><a href="<?php echo URLROOT ?>pages/apple"><img src="public/img/fruit/apple.jpg" alt="Apple" ></a></div>
    <div class="column" title="Watermelon"><a href="<?php echo URLROOT ?>pages/watermelon"><img src="public/img/fruit/watermelon.jpg" alt="Watermelon" ></a></div>
    <div class="column" title="Kiwi"><a href="<?php echo URLROOT ?>pages/kiwi"><img src="public/img/fruit/kiwi.jpg" alt="Kiwi" ></a></div>
  </div>

</div>
  <div class="color">
  <div class="row">
    <div class="column" title="Grape"><a href="<?php echo URLROOT ?>pages/grape"><img src="public/img/fruit/grape.jpg" alt="Grape" ></a></div>
    <div class="column" title="Raspberry"><a href="<?php echo URLROOT ?>pages/raspberry"><img src="public/img/fruit/raspberry.jpg" alt="Raspberry" ></a></div>
    <div class="column" title="Blueberry"><a href="<?php echo URLROOT ?>pages/blueberry"><img src="public/img/fruit/blueberry.jpg" alt="Blueberry" ></a></div>
  </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php';?>

