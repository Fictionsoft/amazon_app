<div class="user_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $this->element('user_nav');  ?>
            </div>

            <div class="col-sm-9">

                <div class="product_finder_search">

                    <div class="row">
                        <?php echo $this->Form->create('ProductFinderSearch'); ?>
                            <div class="col-sm-4 padding_cut_right">
                                <label class="search_category" >Categories</label>
                                <?php echo $this->Form->input('category', array('label' => false, 'options' => $categories,'empty' => 'Select Category','class' => 'select_option form-control'));?>
                            </div>



                            <div class="col-sm-6">
                                <label class="select_price">Price</label><br>
                                <div class="row">
                                    <div class="col-sm-6 padding_cut_right">
                                        <?php echo $this->Form->input('min', array('label' => false, 'placeholder' => 'Min', 'class' => 'form-control select_option')); ?>
                                    </div>

                                    <div class="col-sm-6 padding_cut_right">
                                        <?php echo $this->Form->input('max', array('label' => false, 'placeholder' => 'Mix', 'class' => 'form-control select_option')); ?>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-sm-4">
                                <label class="select_price">Rank:</label>
                                <div class="row">
                                    <div class="col-sm-6 padding_cut_right">
                                        <?php /*echo $this->Form->input('rank_min', array('label' => false, 'placeholder' => 'Min', 'class' => 'form-control select_option')); */?>
                                    </div>

                                    <div class="col-sm-6 padding_cut_right">
                                        <?php /*echo $this->Form->input('rank_max', array('label' => false, 'placeholder' => 'Mix', 'class' => 'form-control select_option')); */?>
                                    </div>
                                </div>
                            </div>-->

                            <div class="col-sm-2" style="padding-right:0">
                                <label>&nbsp</label>
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

                <?php echo $this->Session->flash();?>

                <?php //pr($items); die; ?>
                <?php if(!empty($items)) { ?>
                <div class="table-responsive product_finder_table">
                    <table class="table">

                        <thead class="thead-inverse">
                        <tr class="table_head">

                            <th class="product_finder_th sales_rank_title">Sales Rank</th>
                            <th class="product_finder_th product_info_title">Product Info</th>
                            <th class="product_finder_th category_title">Category</th>
                            <th class="product_finder_th price_title">Price</th>
                            <th class="product_finder_th weight_title">Weight</th>
                            <th class="product_finder_th reviews_title">Reviews</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($items as $item){
                        ?>

                        <tr class="table_container">
                            <td class="product_finder_img odd">
                                <div class="sales_rank">
                                    <?php echo ( isset($item['SalesRank']) )? $item['SalesRank'] : '-'  ?>
                                </div>

                                <div class="product_img">
                                    <?php
                                        if(isset($item['MediumImage']['URL'])){
                                            $image = $item['MediumImage']['URL'];

                                        }else if(isset($item['ImageSets']['ImageSet']['MediumImage']['URL'])){
                                            $image = $item['ImageSets']['ImageSet']['MediumImage']['URL'];
                                        }else{
                                             $image = $this->Html->url('/images/amazon-no-image.jpg');
                                        }
                                        echo '<div class="product_img"><img src="'. $image .'"/></div>';

                                    ?>

                                </div>
                            </td>

                            <td class="even product_title">
                                <div>
                                    <a href="<?php echo $item['DetailPageURL'] ?>" target="_blank">
                                        <?php echo $item['ItemAttributes']['Title'] ?>
                                    </a>
                                </div>
                                <div>ASIN: <?php echo $item['ASIN'] ?></div>
                            </td>

                            <td class="odd"><?php echo $category ?></td>
                            <td class="even"><?php echo ( isset( $item['ItemAttributes']['ListPrice']['FormattedPrice'] ) )? $item['ItemAttributes']['ListPrice']['FormattedPrice'] : '-'; ?></td>
                            <td class="even"><?php echo ( isset ( $item['ItemAttributes']['ItemDimensions']['Weight'] ) ) ? $item['ItemAttributes']['ItemDimensions']['Weight'] : '-'; ?></td>
                            <td class="review_iframe">

                                <a  href="javascript:void(0)" data-toggle="modal" data-target="#review-<?php echo $item['ASIN']; ?>">Review</a>

                                <div id="review-<?php echo $item['ASIN']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Customer Reviews</h4>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="<?php echo $item['CustomerReviews']['IFrameURL'] ?>" frameBorder="0">
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
                        </tr>
                        <?php } ?>


                        </tbody>
                    </table>

                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>