<section class="front_page_wrapper">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">

                <div class="form_content">
                    <?php echo $this->Session->flash() ?>

                    <div class="form_title">
                        <h2 class="title">Contact Us</h2>
                    </div>

                    <div class="status alert alert-success" style="display: none"></div>
                    <?php echo $this->Form->create('contact',array('url'=>'/users/contact','class'=>'ontact-form row')) ?>
                    <div class="form-group col-md-6">
                        <?php echo $this->Form->input('name',array('required'=>true,'placeholder'=>'Name','label'=>false,'class'=>'form-control',)) ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo $this->Form->input('email',array('required'=>true,'placeholder'=>'Email','label'=>false,'class'=>'form-control',)) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php echo $this->Form->input('subject',array('required'=>true,'placeholder'=>'Subject','label'=>false,'class'=>'form-control',)) ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php echo $this->Form->input('message',array('type'=>'textarea','rows'=>'8','required'=>true,'placeholder'=>'Your Message Here','label'=>false,'class'=>'form-control','div'=>false,'style'=>'height:200px;')) ?>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="submit" class="custom_btn pull-right" value="Submit">
                    </div>
                    <?php echo $this->Form->end() ?>

                </div>

            </div>

            <div class="col-sm-2">

            </div>

            <div class="col-sm-4">
                <div class="contact_info">
                    <h3>Contact Information</h3>
                    <h4> <a href="#"><?php echo $site_name; ?></a></h4>
                    <div><b>Mobile:</b> 01736435687</div>
                    <div><b>Email:</b> <a href="#"><?php echo $site_email; ?></a></div>
                    <div><b>Web Site:</b><a href="#">www.amazonapp.com</a></div>
                    <div><b>Address:</b>Dhanmondi, Dhaka</div>
                </div>

            </div>

        </div>
        </div>
    </div>

</section>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery('#contactDisplayForm').validate({

        });
    });
</script>