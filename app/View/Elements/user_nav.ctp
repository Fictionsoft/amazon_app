<?php if(strtolower($this->params['controller'])=='emailtemplates' and ($this->params['action']=='create' or $this->params['action']=='update') ){ ?>

<div class="navbar-default sidebar front_end_sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"> Buyer Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a>[[buyer-name]]</a>
                    </li>
                    <li>
                        <a>[[first-name]]</a>
                    </li>
                    <li>
                        <a>[[buyer-email]]</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Order Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a>[[product-name]]</a>
                    </li>
                    <li>
                        <a>[[order-id]]</a>
                    </li>
                    <li>
                        <a>[[msku]]</a>
                    </li>
                    <li>
                        <a>[[asin]]</a>
                    </li>
                    <li>
                        <a>[[quantity]]</a>
                    </li>
                    <li>
                        <a>[[price-item]]</a>
                    </li>
                    <li>
                        <a>[[price-shipping]]</a>
                    </li>
                    <!--<li>
                        <a> [[condition-note]]</a>
                    </li>-->
                    <li>
                        <a>[[recipient]]</a>
                    </li>
                    <li>
                        <a>[[purchase-date]]</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#">Shipping Info<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a>[[ship-address1]]</a>
                    </li>
                    <li>
                        <a>[[ship-address2]]</a>
                    </li>
                    <li>
                        <a>[[ship-city]]</a>
                    </li>
                    <li>
                        <a>[[ship-state]]</a>
                    </li>
                    <li>
                        <a>[[ship-zip]]</a>
                    </li>
                    <li>
                        <a>[[ship-country]]</a>
                    </li>
                    <!--<li>
                        <a>[[carrier]]</a>
                    </li>
                    <li>
                        <a>[[tracking-number]]</a>
                    </li>-->
                    <li>
                        <a>[[estimated-arrival]]</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#">Links<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a>[[feedback-link]]</a>
                    </li>
                    <li>
                        <a>[[contact-link]]</a>
                    </li>
                    <li>
                        <a>[[order-link]]</a>
                    </li>
                    <li>
                        <a>[[product-link]]</a>
                    </li>
                    <li>
                        <a>[[product-review-link]]</a>
                    </li>
                    <!--<li>
                        <a>[[tracking-link]]</a>
                    </li>-->
                    <li>
                        <a>[[store-link]]</a>
                    </li>
                    <li>
                        <a>[[store-link-alt]]</a>
                    </li>
                    <!--<li>
                        <a>[[unsubscribe-link]]</a>
                    </li>-->

                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>

    <div style="height: 2px; background:#ddd; margin-bottom: 100px;"></div>


<?php } ?>

<div class="user_nav">

    <ul>
        <?php if( $this->Common->isAdmin($this->Session->read('Auth.User.role_id')) or $this->Common->isSeller($this->Session->read('Auth.User.role_id'))){ ?>

        <li><a href="<?php echo $this->Html->url('/users/user_dashboard'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="<?php echo $this->Html->url('/products/product_finder'); ?>"><i class="fa fa-search"></i>Product Finder</a></li>
        <li><a href="<?php echo $this->Html->url('/products/product_evaluator');?>"><i class="fa fa-tasks"></i>Product Evaluator</a></li>
        <li><a href="<?php echo $this->Html->url('/productRanks/ranking_tracker'); ?>"><i class="fa fa-envelope"></i>Ranking Tracker</a></li>
        <li><a href="<?php echo $this->Html->url('/products/keyword_cloud'); ?>"><i class="fa fa-cloud"></i>Keyword Cloud</a></li>
        <li><a href="<?php echo $this->Html->url('/EmailTemplates'); ?>"><i class="fa fa-envelope"></i>Messages</a></li>
        <?php } ?>

        <?php if($this->Common->isWorker($this->Session->read('Auth.User.role_id'))){ ?>
        <li><a href="<?php echo $this->Html->url('/JobLinks'); ?>"><i class="fa fa-briefcase" ></i>Links</a></li>
        <li><a href="<?php echo $this->Html->url('/jobs/my_jobs/0'); ?>"><i class="fa fa-briefcase" ></i>My Jobs</a></li>
        <li><a href="<?php echo $this->Html->url('/jobs/my_jobs/1'); ?>"><i class="fa fa-briefcase" ></i>Completed Jobs</a></li>
        <?php } ?>

        <!--<li><a href="#"><i class="fa fa-money"></i>Sales Tracker</a></li>
        <li><a href="#"><i class="fa fa-envelope"></i>Email Autoresponders</a></li>
        <li><a href="#"><i class="fa fa-archive"></i>Inventory Manager</a></li>
        <li><a href="#"><i class="fa fa-money"></i>Friendly</a></li>-->
    </ul>
</div>