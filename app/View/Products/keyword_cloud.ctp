<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">
                <?php echo $this->Session->flash();?>

                <div class="product_finder_search">
                    <div class="row">
                        <?php echo $this->Form->create('KeywordCloudSearch'); ?>

                            <div class="col-sm-5 padding_cut_right">
                                <?php echo $this->Form->input('product_name', array('label' => false, 'placeholder' => 'Enter a Keyword or a Product Name', 'class' => 'form-control select_option')); ?>
                            </div>

                            <div class="col-sm-5 padding_cut_right">
                                <?php echo $this->Form->input('product_additional_keyword', array('label' => false, 'placeholder' => 'Enter a Additional Keyword or a Product Name  ', 'class' => 'form-control select_option')); ?>
                            </div>

                            <div class="col-sm-2" style="padding-right:0">
                                <div class="product_search_btn">
                                    <button class="custom_btn" type="submit">
                                        <i class="fa fa-search"></i>
                                        Search
                                    </button>
                                </div>
                            </div>

                        <?php echo $this->Form->end() ?>
                    </div>
                </div>

                <div class="keyword_cloud_con">
                    <div class="keyword_cloud_con_head">
                       <h3>Top 20 Keywords </h3>
                    </div>
                    <ul>
                        <?php if(isset($keywords)) {
                            foreach($keywords as $keyword){
                        ?>
                        <li><i class="fa fa-angle-right"></i><?php echo $keyword ?> </li>

                        <?php } }?>


                    </ul>

                </div>

                <?php if(! empty($items)) { ?>


                <?php } ?>
            </div>
        </div>
    </div>
</div>