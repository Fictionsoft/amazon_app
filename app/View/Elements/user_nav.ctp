<div class="user_nav">
    <ul>
        <?php if( $this->Common->isAdmin($this->Session->read('Auth.User.role_id'))){ ?>
        <li><a href="<?php echo $this->Html->url('/users/user_dashboard'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?php echo $this->Html->url('/products/product_finder'); ?>"><i class="fa fa-search"></i>Product Finder</a></li>
        <li><a href="<?php echo $this->Html->url('/products/product_evaluator');?>"><i class="fa fa-tasks"></i>Product Evaluator</a></li>
        <li><a href="<?php echo $this->Html->url('/productRanks/ranking_tracker'); ?>"><i class="fa fa-envelope"></i>Ranking Tracker</a></li>
        <li><a href="<?php echo $this->Html->url('/products/keyword_cloud'); ?>"><i class="fa fa-cloud"></i>Keyword Cloud</a></li>
        <?php } ?>

        <?php if($this->Common->isWorker($this->Session->read('Auth.User.role_id'))){ ?>
        <li><a href="<?php echo $this->Html->url('/jobs/my_jobs/0'); ?>"><i class="fa fa-briefcase" ></i>My Jobs</a></li>
        <li><a href="<?php echo $this->Html->url('/jobs/my_jobs/1'); ?>"><i class="fa fa-briefcase" ></i>Completed Jobs</a></li>
        <?php } ?>

        <!--<li><a href="#"><i class="fa fa-money"></i>Sales Tracker</a></li>
        <li><a href="#"><i class="fa fa-envelope"></i>Email Autoresponders</a></li>
        <li><a href="#"><i class="fa fa-archive"></i>Inventory Manager</a></li>
        <li><a href="#"><i class="fa fa-money"></i>Friendly</a></li>-->
    </ul>
</div>