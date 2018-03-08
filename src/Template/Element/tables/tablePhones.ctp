<?php foreach ($tableValues as $value): ?>
    <tr>
        <td><?= $this->Number->format($value->id) ?></td>
        <td class="form-group"><?php if (h($value->active)==1) {
            echo  "<span class='fas fa-check'></span>";
            }else {
                echo  "<span class='fas fa-times'></span>";
            } ?> </td>
   
        <td><?= h($value->phoneNumber) ?></td>
        <td><?= h($value->created) ?></td>
        <td>
           

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

            }else {
                echo  $this->Form->postLink('<i class="fas fa-reply"></i>',
                    ['action' => 'restore', $value->id], ['class' => 'btn btn-outline-info  btn-xs','escape' => false,
                    'style'               =>'width: 44px; height: 38px ',
                        'confirm' => __('Are you sure you want to restore # {0}?', $value->id)]);
            } ?>
        </td>
    </tr>
<?php endforeach; ?>
