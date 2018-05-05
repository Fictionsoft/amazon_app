<?php $site_name = $this->requestAction('settings/setting'); ?>
<?php $left_navigation = $this->requestAction('dashboards/dashboard_links'); ?>

<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title> <?php echo $site_name.': '. $this->fetch('title'); ?> </title>
    <?php
    echo $this->Html->meta('icon');

    $version = Configure::read('version');

    echo $this->Html->css(array(
        'admin_style.css?v='.$version,
        'bootstrap.min.3.0.3',
        'plugins/metisMenu/metisMenu.min',
        'plugins/timeline',
        'sb-admin-2',
        'jquery-ui',
        'admin_custom.css?v='.$version,
        'plugins/morris',
        'font-awesome-test.min'
    ));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo "\n" . '<script type="text/javascript">var BASE_URL = \'' . $this->Html->url('/', true) . '\';</script>';
    echo "\n" . '<script type="text/javascript">var CONTROLLER = \'' . $this->name . '\';</script>';
    echo "\n" . '<script type="text/javascript">var ACTION = \'' . $this->action . '\';</script>';
    echo $this->fetch('script');
    echo $this->Html->script('jquery');
    echo $this->Html->script('jquery-ui');
    echo $this->Html->script('custom.js?v='.$version);
    echo $this->Html->script('jquery.validate');
    echo $this->Html->script('inflection');
    echo $this->Html->script('custom_admin.js?v='.$version);

    ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href=""></a>-->
            <?php
            echo $this->Html->link($site_name,Router::url('/',true),array('class' => 'navbar-brand') );
            ?>
        </div>
        <ul class="nav navbar-top-links navbar-right">

            <?php
            if($this->Session->check('Auth.User')) {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo Router::url('/users/my_profile',true) ?>"><i class="fa fa-user fa-fw"></i>My Profile</a>
                        </li>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Router::url('/users/logout',true) ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            <?php } ?>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <?php //$this->log($this->params); ?>
                    <?php
                        //pr($this->params['pass']); die;

                        if(isset($this->params['pass'][0])){
                            $pass = $this->params['pass'][0];
                        }else{
                            $pass = null;
                        }

                    ?>


                    <li>
                        <a href="<?php echo $this->base;?>/admin/dashboards/display" class="<?php echo ($this->params['controller']=='dashboards' AND $this->params['action']=='admin_display')?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i> Dashboard <span class="fa arrow"></span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Amazon App<span class="fa arrow"></span></a>

                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Works<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level <?php echo( $this->params['controller'] == 'requirements' OR $this->params['controller'] == 'jobs'  OR $this->params['controller'] == 'joblinks'  OR $this->params['controller'] == 'users' ) ? 'in': ' '; ?>">
                            <li><a href="<?php echo $this->base;?>/admin/requirements" class="<?php echo ($this->params['controller']=='requirements' AND $this->params['action']=='admin_index')?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i> Requirements <span class="fa arrow"></span></a></li>
                            <li><a href="<?php echo $this->base;?>/admin/jobs" class="<?php echo ($this->params['controller']=='jobs' AND $this->params['action']=='admin_index')?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i> Jobs <span class="fa arrow"></span></a></li>
                            <li><a href="<?php echo $this->base;?>/admin/joblinks" class="<?php echo ($this->params['controller']=='joblinks' AND $this->params['action']=='admin_index')?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i> Job Links <span class="fa arrow"></span></a></li>

                            <li><a href="<?php echo $this->base; ?>/admin/users/index/3" class="<?php echo ($this->params['controller']=='users' and $pass == 3 )?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i>Clients<span class="fa arrow"></span></a></li>
                            <li><a href="<?php echo $this->base; ?>/admin/users/index/2" class="<?php echo ($this->params['controller']=='users' and $pass == 2 )?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i>Workers<span class="fa arrow"></span></a></li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="<?php echo $this->base;?>/admin/settings" class="<?php echo ($this->params['controller']=='settings' AND $this->params['action']=='admin_index')?'active':'' ?>"><i class="fa fa-wrench fa-fw"></i> Settings <span class="fa arrow"></span></a>
                    </li>


                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $this->Session->flash(); ?>
                <?php
                echo $this->fetch('content'); ?>
                <br/>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php echo $this->element('sql_dump'); ?>

<?php
echo $this->Html->script(
    array(
        'bootstrap.min.3.0.3',
        'plugins/metisMenu/metisMenu.min',
        'sb-admin-2'
    )
);

echo $this->Js->writeBuffer();
?>
</body>
</html>
