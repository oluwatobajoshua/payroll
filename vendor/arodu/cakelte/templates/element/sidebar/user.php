<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <?= $this->Html->image('CakeLte./AdminLTE/dist/img/premierhotel_logo.jpeg', array('class' => 'img-circle', 'alt' => 'User Image')) ?>
    <!--<?= $this->Html->image('CakeLte./AdminLTE/dist/img/user2-160x160.jpg', ['class'=>'img-circle elevation-2', 'alt'=>'User Image']) ?>-->
  </div>
  <div class="info">
    <!--<p><?php echo $this->request->getSession()->read('Auth.username') ?></p>-->
    <a href="/" class="d-block"><?php echo $this->request->getSession()->read('Auth.username') ?></a>
  </div>
</div>
