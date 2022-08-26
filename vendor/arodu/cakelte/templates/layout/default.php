<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

    <title><?= $this->fetch('title') . ' | ' . strip_tags($this->CakeLte->getConfig('app-name')) ?></title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <?= $this->Html->css('CakeLte.style') ?>
    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
</head>

<body class="hold-transition <?= $this->CakeLte->getBodyClass() ?>">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?= $this->CakeLte->getHeaderClass() ?>">
            <?= $this->element('header/main') ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?= $this->CakeLte->getSidebarClass() ?>">
            <!-- Brand Logo -->
            <a href="<?= $this->Url->build('/') ?>" class="brand-link">
                <?= $this->Html->image($this->CakeLte->getConfig('app-logo'), ['alt' => $this->CakeLte->getConfig('app-name') . ' logo', 'class' => 'brand-image']) ?>
                <span class="brand-text font-weight-light"><?= $this->CakeLte->getConfig('app-name') ?></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <?= $this->element('sidebar/main') ?>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <?= $this->element('content/header') ?>
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <?= $this->element('aside/main') ?>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <?= $this->element('footer/main') ?>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <!-- DataTables  & Plugins -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jszip/jszip.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/pdfmake/pdfmake.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/pdfmake/vfs_fonts.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
    <!-- <?= $this->element('layout/script') ?>
    <?= $this->fetch('script') ?> -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/payroll.js') ?>
</body>

</html>