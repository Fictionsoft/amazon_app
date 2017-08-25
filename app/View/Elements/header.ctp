
    <div class="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="header_logo">
                            <h2><a href="<?php echo $this->Html->url('/'); ?>">Site Logo <?php //echo $this->Html->image('/images/home/logo.png');?></a></h2>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="header_top_menu">
                            <ul>
                                <li><a href="<?php echo $this->Html->url('/'); ?>">Home  </a></li>
                                <li><a href="<?php echo $this->Html->url('/pages/about_us');?>"> About Us </a></li>
                                <li><a href="<?php echo $this->Html->url('/pages/contact_us'); ?>"> Contact Us</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="header_right">
                            <?php if ($this->Session->check('Auth.User')){
                                echo '<a href="'.$this->Html->url('/Users/logout').'"> Logout</a>';
                                echo ' <a href="'.$this->Html->url('/Users/user_dashboard').'">Welcome '.$this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.last_name').'</a>';
                            }else{

                                echo '<a href="'.$this->Html->url('/Users/login').'"><span>Login</span></a>';
                                echo '<a href="'.$this->Html->url('/Users/signup').'"><span>Signup</span></a>';

                             } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>