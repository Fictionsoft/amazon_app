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
                        <?php echo $this->Form->create('ProductRank'); ?>


                        <div class="col-sm-5 padding_cut_right">
                            <?php echo $this->Form->input('filter', array('label' => false, 'placeholder' => 'Keyword', 'class' => 'form-control select_option')); ?>
                        </div>

                        <div class="col-sm-2" style="padding-right:0">
                            <div class="product_search_btn">
                                <button class="custom_btn" type="submit">
                                    <i class="fa fa-search"></i>
                                    Search
                                </button>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="ranking_reset_btn">
                                <a class="custom_btn" href="<?php echo $this->Html->url('/ProductRanks/ranking_tracker'); ?>">Reset</a>
                            </div>

                        </div>
                        <?php echo $this->Form->end() ?>

                        <div  class="col-sm-3">
                            <div class="product_search_btn">
                                <button type="button" class="custom_btn" data-toggle="modal" data-target="#add-ranking-tracker">
                                    <i class="fa fa-plus"></i>
                                    Add Products
                                </button>

                            </div>

                            <div id="add-ranking-tracker" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Products</h4>
                                        </div>

                                        <div class="modal-body">
                                            <p>Please paste either the ASIN or url of your product, 1 per line. </p>

                                                <?php
                                                echo $this->Form->create('ProductRank', array('controller'=>'productRanks','action' => 'add_product'));
                                                echo '<div class="form-group">'.$this->Form->input('asin', array('type' => 'textarea','label'=>false, 'class' =>'form-control')).'</div>';
                                                echo '<div class="form-group text-right"><button class="custom_btn"><i class="fa fa-check"></i>Add Products</button></div>';

                                                echo $this->Form->end();

                                                ?>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <?php // pr($products); die; ?>
                <?php if(!empty($products)) { ?>
                    <div class="table-responsive product_finder_table">
                        <table class="table">

                            <thead class="thead-inverse">
                            <tr class="table_head">
                                <th colspan="2" class="product_finder_th sales_rank_title">Product</th>
                                <th class="product_finder_th asin_title">ASIN</th>
                                <th class="product_finder_th sales_rank_title">Sales Rank</th>
                                <th class="product_finder_th reviews_title">Reviews</th>
                                <th class="product_finder_th th_action">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            //pr($products); die;

                            foreach($products as $product){
                                $items = json_decode( $product['ProductRank']['product'], true );
                                //$this->log($items, 'debug');

                                ?>
                                <tr class="table_container">

                                    <td class="product_finder_img odd">
                                        <?php
                                        if(isset($items['MediumImage']['URL'])){
                                            $image = $items['MediumImage']['URL'];

                                        }else if(isset($items['ImageSets']['ImageSet']['MediumImage']['URL'])){
                                            $image = $items['ImageSets']['ImageSet']['MediumImage']['URL'];
                                        }else{
                                            $image = $this->Html->url('/images/amazon-no-image.jpg');
                                        }
                                        echo '<div class="product_img"><img src="'. $image .'"/></div>';

                                        ?>
                                    </td>

                                    <td class="even product_title">
                                        <div>
                                            <a href="<?php echo $items['DetailPageURL'] ?>" target="_blank">
                                                <?php echo $product['ProductRank']['title']; ?>
                                            </a>
                                        </div>

                                    </td>

                                    <td class="odd">
                                        <div><?php echo $items['ASIN'] ?></div>

                                    </td>

                                    <td class="even td_sale_rank">
                                        <div>
                                            <?php echo ( isset($items['SalesRank']) )? $items['SalesRank'] : '-'  ?>
                                        <div>
                                        <div>
                                            <?php echo $items['ItemAttributes']['ProductGroup'] ?>

                                        </div>

                                    </td>

                                    <td class=" odd review_iframe">

                                        <a  href="javascript:void(0)" data-toggle="modal" data-target="#review-<?php echo $items['ASIN']; ?>">Review</a>

                                        <div id="review-<?php echo $items['ASIN']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Customer Reviews</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <iframe src="<?php echo $items['CustomerReviews']['IFrameURL'] ?>" frameBorder="0">
                                                            <p>Your browser does not support iframes.</p>
                                                        </iframe>

                                                        <script>
                                                            jQuery(document).ready(function(){
                                                                iFrameResize({log:false});
                                                            });
                                                        </script>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </td>

                                    <td class=" even td-action">
                                        <!-- Add keyword start -->
                                        <a href="javascript:void(0);" class="a_keywords" data-toggle="modal" data-target="#productTrackerAddKey<?php echo $product['ProductRank']['id'];?>"><i class="glyphicon glyphicon-plus"></i></a>
                                        <div id="productTrackerAddKey<?php echo $product['ProductRank']['id'];?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Add Keywords</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p><b>Add keyword to: </b> <?php  echo $items['ItemAttributes']['Title'] ?></p>

                                                        <?php
                                                        echo $this->Form->create('ProductKeyword', array('url'=>'/productkeywords/add_keyword'));
                                                        echo $this->Form->input('product_rank_id', array('type' => 'hidden','value' => $product['ProductRank']['id'] , 'label'=>false));
                                                        echo '<div class="form-group">'.$this->Form->input('keyword', array('type' => 'textarea','label'=>false, 'class' =>'form-control')).'</div>';
                                                        echo '<div class="form-group text-right"><button class="custom_btn">Save</button></div>';

                                                        echo $this->Form->end();

                                                        ?>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- end add keyword -->

                                        <!-- start view keyword -->
                                        <a data-toggle="collapse" href="#productTrackerViewKey<?php echo $product['ProductRank']['id'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        <!-- end view keyword -->

                                        <!-- Start edit product -->
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#productTrackerEdit<?php echo $product['ProductRank']['id'];?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <div id="productTrackerEdit<?php echo $product['ProductRank']['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Edit Product</h4>
                                                    </div>

                                                    <?php  ?>
                                                    <div class="modal-body">
                                                        <p>Name </p>

                                                        <?php
                                                        echo $this->Form->create('ProductRank', array( 'url'=>'/productRanks/update/'.$product['ProductRank']['id']));
                                                        echo '<div class="form-group">'.$this->Form->input('title', array('type' => 'textarea','value' => $product['ProductRank']['title'], 'label'=>false, 'class' =>'form-control')).'</div>';
                                                        echo '<div class="form-group text-right"><button class="custom_btn">Update</button></div>';

                                                        echo $this->Form->end();

                                                        ?>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- End product -->

                                        <!-- Details -->
                                        <a href="<?php echo $items['DetailPageURL'] ?>" target="_blank"><i class="glyphicon glyphicon-new-window"></i></a>

                                        <!-- Start edit delete -->
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#productTrackerDelete<?php echo $product['ProductRank']['id'];?>"><i class="glyphicon glyphicon-trash "></i></a>
                                        <div id="productTrackerDelete<?php echo $product['ProductRank']['id']; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete Product ?</h4>
                                                    </div>

                                                    <?php  ?>
                                                    <div class="modal-body">
                                                        <b>Are you sure you want to delete following item: </b>
                                                        <p> <?php echo $product['ProductRank']['title'] ?> </p>

                                                        <?php
                                                        echo $this->Form->create('ProductRank', array( 'url'=>'/productRanks/delete/'.$product['ProductRank']['id']));
                                                        echo '<div class="form-group text-right"><button class="custom_btn">Confirm</button></div>';

                                                        echo $this->Form->end();

                                                        ?>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- End product -->
                                    </td>
                                </tr>

                                <tr id="productTrackerViewKey<?php echo $product['ProductRank']['id'];?>" class="panel-collapse collapse keyword_row">
                                    <td class="td_keyword" colspan="6">

                                    <div class="table-responsive product_finder_table">
                                        <table class="table">
                                            <?php if( $product['ProductKeyword'] ){ // Key word is exists ?>
                                                <thead class="thead-inverse">
                                                    <tr class="table_head">
                                                        <th class="product_finder_th th_sales_rank_keyword">Keyword</th>
                                                        <th class="product_finder_th th_action">Action</th>
                                                    </tr>
                                                </thead>
                                            <?php } ?>

                                            <tbody>
                                            <?php
                                                if( !$product['ProductKeyword']){ // Key word is exists
                                                    echo '<tr><td class="keyword_not_aevaliable"><div class="alert alert-danger"> Keyword does not aveliable! </div></td></tr>';
                                                }

                                            foreach( $product['ProductKeyword'] as $keyword ){ ?>

                                                <tr>

                                                    <td class="td_keyword">
                                                        <?php
                                                        echo $keyword['keyword'];
                                                        ?>
                                                    </td>

                                                    <td class="td_action">
                                                        <!-- Start edit delete keyword -->
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#productTrackerKeyDelete<?php echo $keyword['id'];?>">Delete</a>
                                                        <div id="productTrackerKeyDelete<?php echo $keyword['id'];?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delete Keyword ?</h4>
                                                                    </div>

                                                                    <?php  ?>
                                                                    <div class="modal-body">
                                                                        <b>Are you sure you want to delete following item: </b>
                                                                        <p> <?php echo $keyword['keyword']; ?> </p>

                                                                        <?php
                                                                        echo $this->Form->create('ProductKeyword', array( 'url'=>'/productkeywords/delete/'.$keyword['id']));
                                                                        echo '<div class="form-group text-right"><button class="custom_btn">Confirm</button></div>';

                                                                        echo $this->Form->end();

                                                                        ?>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- End product -->

                                                    </td>

                                                    <?php } ?>
                                                </tr>
                                            </tbody>

                                        </table>

                                    </div>

                                    </td>
                                </tr>

                            <?php

                            }

                            ?>

                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>