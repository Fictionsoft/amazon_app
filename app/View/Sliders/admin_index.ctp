<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"><h3>Slider List</h3></div>

        <div class="col-md-2 col-md-offset-5 top_space">
            <?php
            echo $this->Html->link(
                'Add new',
                '/admin/sliders/create',
                array('class' => 'btn btn-primary')
            );
            ?>
        </div>
    </div>
    <br/>
</div>

<?php
$paginator = $this->Paginator;
if($sliders){
?>
    <table class="table table-hover">
    <tr>
        <th>#Id</th>
        <th><?php echo $paginator->sort('name')?></th>
        <th>Photo</th>
        <th><?php echo $paginator->sort('status') ?></th>
        <th>Action</th>
    </tr>
    <?php
    $i=1;
    foreach( $sliders as $slider ) {

    ?>
        <tr>
            <td><?php echo $i ?> </td>
            <td><?php echo $slider['Slider']['name'] ?></td>
            <td><div class="form-group"><?php echo $this->Html->image($this->element( 'default_photo_selector', array( 'photo'=>$slider['Slider']['cover_photo'],'dir'=>'sliders' ) ), array('alt' => 'Slider','width'=>'50')) ?></div></td>
            <td class="center"><?php echo $this->element('admin/toggle', array('status' => $slider['Slider']['status'] )) ?>&nbsp;</td>
            <td>
                <?php
                    // edit link
                    echo $this->Html->link("Edit", array('action' => 'update', $slider['Slider']['id'])).'&nbsp;&nbsp;';
                    //delete link
                    echo $this->Form->postLink('Delete', array('action' => 'delete', $slider['Slider']['id']),array('confirm' => 'Are you sure you want to delete this Product?'));
                ?>
            </td>
       </tr>
    <?php
        $i++;
    }
        unset($slider);
    ?>
    </table>


<?php
}else{
    echo '<div class="alert alert-danger" role="alert">Slider is not available !</div>';
}
?>



