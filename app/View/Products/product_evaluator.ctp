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
                        <?php echo $this->Form->create('ProductKeywordSearch'); ?>
                            <div class="col-sm-8 padding_cut_right">
                                <?php echo $this->Form->input('keyword', array('label' => false, 'placeholder' => 'Keyword', 'class' => 'form-control select_option')); ?>
                            </div>
                            <div  class="col-sm-2">
                                <select class="form-control select_option no-radius" name="SearchResult">
                                    <option value="16">Top 10</option>
                                </select>
                            </div>

                            <div class="col-sm-2">
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
                <?php //pr($items); die; ?>
                <?php if(!empty($items)) { ?>
                <div class="table-responsive product_finder_table">
                    <table class="table">

                        <thead class="thead-inverse">
                        <tr class="table_head">
                            <th class="product_finder_th sales_rank_title">Sales Rank</th>
                            <th class="product_finder_th product_info_title">Product Info</th>
                            <th class="product_finder_th price_title">Price</th>
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
                            <td class="even"><?php echo ( isset( $item['ItemAttributes']['ListPrice']['FormattedPrice'] ) )? $item['ItemAttributes']['ListPrice']['FormattedPrice'] : '-'; ?></td>

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