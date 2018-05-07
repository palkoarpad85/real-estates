<?php foreach ($tableValues as $value): ?>
<?php if (h($value->active)==1) {   ?>
<tr>
        
       
   
        <td><?= h($value->phoneNumber) ?></td>
        <td><?= h($value->created) ?></td>
        <td>
        <?= $this->Html->link(
            '<i class="fa fa-info"></i>',
            array(
            'controller'=>$this->name,
            'action'=>'view',
            $value->id
            ),
            array(
            'data-original-title' => 'Edit',
            'class'               => 'btn btn-outline-primary btn-xs',     
            'style'               =>'width: 44px; height: 38px ',       
            'escape'              => false
            )
            );
            ?> 
           <?= $this->Html->link(
            '<i class="fa fa-edit"></i>',
            array(
            'controller'=>$this->name,
            'action'=>'edit',
            $value->id
            ),
            array(
            'data-original-title' => 'Edit',
            'class'               => 'btn btn-outline-success btn-xs',     
            'style'               =>'width: 44px; height: 38px ',       
            'escape'              => false
            )
            );
            ?>
            <?php if (h($value->active)==1) {
                echo  $this->Form->postLink('<i class="far fa-trash-alt"></i>',
                    ['action' => 'delete', $value->id], ['class' => 'btn btn-outline-danger  btn-xs','escape' => false,
                    'style'               =>'width: 44px; height: 38px ',
                        'confirm' => __('Are you sure you want to delete # {0}?', $value->id)]);

            } ?>     
        </td>
    </tr>
    <?php } ?>
<?php endforeach; ?>
