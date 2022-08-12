<li class="nav-item dropdown user-menu">
  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
    <?= $this->Html->image('CakeLte./AdminLTE/dist/img/premierhotel_logo.jpeg', array('class' => 'user-image img-circle elevation-2', 'alt' => 'User Image')) ?>
    <span class="d-none d-md-inline"><?php echo $this->request->getSession()->read('Auth.username') ?></span>
  </a>
  <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <!-- User image -->
    <li class="user-header bg-primary">
      <?= $this->Html->image('CakeLte./AdminLTE/dist/img/premierhotel_logo.jpeg', array('class' => 'user-image img-circle elevation-2', 'alt' => 'User Image')) ?>

      <p>
        <?php echo $this->request->getSession()->read('Auth.username') ?>
        <small>Member since <?= $this->request->getSession()->read('Auth.created');?></small>
      </p>
    </li>
    <!-- Menu Body -->
    <!--<li class="user-body">-->
    <!--  <div class="row">-->
    <!--    <div class="col-4 text-center">-->
    <!--      <a href="#">Followers</a>-->
    <!--    </div>-->
    <!--    <div class="col-4 text-center">-->
    <!--      <a href="#">Sales</a>-->
    <!--    </div>-->
    <!--    <div class="col-4 text-center">-->
    <!--      <a href="#">Friends</a>-->
    <!--    </div>-->
    <!--  </div>-->
      <!-- /.row -->
    <!--</li>-->
    <!-- Menu Footer-->
    <li class="user-footer">
      <a href="/profile" class="btn btn-default btn-flat">Profile</a>
      <a href="/logout" class="btn btn-default btn-flat float-right">Sign out</a>
    </li>
  </ul>
</li>