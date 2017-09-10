
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"><h3><?php echo " $page_title List" ?></php></h3></div>
        <div class="col-md-3 top_space">
            <?php echo $this->Form->create('User') ?>
                <div class="input-group custom-search-form">
                    <?php echo $this->Form->input('filter',array('placeholder'=>'Search...','class'=>'form-control','label'=>false) ) ?>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            <?php echo $this->Form->end() ?>
        </div>
        <div class="col-md-2 top_space">
            <?php
            echo '<div class="reset-button">'.$this->Html->link('Reset',array('controller' => 'users', 'action' => 'reset',$this->params['pass']['0'], 'admin' =>true),array('class'=>'btn btn-primary')).'</div>';
            ?>
        </div>
        <div class="col-md-2 top_space">
            <?php
            echo $this->Html->link(
                'Add new',
                '/admin/users/create',
                array('class' => 'btn btn-primary')
            );
            ?>
        </div>
    </div>
    <br/>
</div>


<?php
// so we use the paginator object the shorter way.
// instead of using '$this->Paginator' everytime, we'll use '$paginator'
$paginator = $this->Paginator;

if(!empty($users)){

    //creating our table
    echo '<table class="table table-hover">';

    // our table header, we can sort the data user the paginator sort() method!
    echo "<tr>";
            echo "<th>#Id</th>";
            echo "<th>" . $paginator->sort('first_name') . "</th>";
            echo "<th>" . $paginator->sort('last_name') . "</th>";
            echo "<th>" . $paginator->sort('email') . "</th>";
            echo "<th>" . $paginator->sort('phone') . "</th>";
            echo "<th>" . $paginator->sort('role_id','Role') . "</th>";
            echo "<th>" . $paginator->sort('status') . "</th>";
            echo '<th>Action</th>';
        echo "</tr>";

    $i=1;
    foreach( $users as $user ):
    echo "<tr>";
            echo "<td>{$i}</td>";
            echo "<td>{$user['User']['first_name']}</td>";
            echo "<td>{$user['User']['last_name']}</td>";
            echo "<td>{$user['User']['email']}</td>";
            echo "<td>{$user['User']['phone']}</td>";
            echo "<td>{$user['Role']['name']}</td>";
        ?>
        <td class="center"><?php echo $this->element('admin/toggle', array('status' => $user['User']['status'] )) ?>&nbsp;</td>


       <td>
           <?php
           // edit
           echo $this->Html->link(
               "View",
               array('action' => '/details',$user['User']['role_id'],$user['User']['id'])
           );

           echo '&nbsp; &nbsp;';
           // edit
           echo $this->Html->link(
               "Edit",
               array('action' => '/update', $user['User']['id'])
           );

           echo '&nbsp; &nbsp;';
            // Delete
           /*echo $this->Form->postLink(
                'Delete',
                array('action' => '/delete', $user['User']['id']),
                array('confirm' => 'Are you sure you want to delete this User?')
            );*/
           ?>
        </td>

    <?php
      echo "</tr>";
        $i++;
        endforeach;
        unset($user);

    echo "</table>";

    ?>

    <?php echo $this->element('admin/paging') ?>

<?php
}else{
    echo '<div class="alert alert-danger" role="alert">Record is not available !</div>';
}
?>



