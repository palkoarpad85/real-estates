
<?php $this->layout = 'admin';?>
<section class="content-header">
    <h2>
        <?=__($this->name)?>
        <small><?=__('List')?></small>
    </h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb ">
    <li  class="breadcrumb-item" aria-current="page"><?=$this->Html->link(__("<i class='fa fa-tachometer-alt'></i> Home"),
    ['plugin' => false, 'controller' => 'Realestates', 'action' => 'dashboard'],
    ['class' => 'breadcrumb-item ', 'escape' => false])?>
    </li>
    <li  class="breadcrumb-item active" aria-current="page"><?=__("<i class='fa fa-outdent'></i> Categories",
    ['class' => 'breadcrumb-item active', 'escape' => false])?></li>
    </ol>
    </nav>
</section>
    <div class="container-fluid">
    <div class="box-header">
                    <div class="row">
                        <div class="col-sm-6 "><h3 class="box-title"><?=__($this->name)?></h3></div>
                    </div><br>
                  <div class="row">
                <div class="col-sm-6"><?=$this->Html->link(__('Add'),
                                                    [
                                                        'action' => 'add',
                                                    ],
                                                    ['class' => 'btn btn-primary']);?>
                </div>
                 <div class="col-sm-6">
                     
                </div>
                </div>
                <br>
                </div>
        <div class="table-responsive">
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <?= $this->Form->create(null, ['type'=>'get'])?> 
                            <td></td>   
                            <td>                            		  
                                <?php 
                                $active1 = (isset($active)) ? $active : 2 ;
                                echo $this->Form->input('',
                                        [                                                             
                                        'type' => 'select',
                                        'label' => false,
                                        'name'  => 'active',
                                        'class' => 'form-control',
                                        'multiple' => false,
                                        'style' => 'width:80px',
                                        'options' => [
                                            2=> __("All"),
                                            1=>__("Active"),
                                            3=>__("Inactive")
                                        ],
                                        'default' => $active1
                                        ]
                                );?>
                            </td>
                            <td><input type="text" class="form-control" style="width:150px" id="controller" name="controller" value="<?php if(isset($controller)) echo $controller ?>" placeholder="Search..."></td>
                            <td><input type="text" class="form-control" style="width:150px"  id="view" name="view" value="<?php if(isset($view)) echo $view ?>"  placeholder="Search..."></td> 
                            <td></td>  
                            <td colspan="2"><button class="btn btn-success"><i class='fas fa-search'></i> <?=__("Search")?></button> 
                            <?=$this->Html->link(__("<i class='fas fa-times'></i> Reset"),
                                                    ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
                                                    ['class' => 'btn btn-danger ', 'escape' => false])?>
                            </td>
                         </tr>
                            <?= $this->Form->end();?>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('controller', __("Controller <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('view', __("View <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('username', __("Created by <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td class=""><?=__('Actions')?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $this->element('tablePermission'); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('controller', __("Controller <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('view', __("View   <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('username', __("Created by <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <td class=""><?=__('Actions')?></td>
                        </tr>
                        </tfoot>
                    </table>
                    
                    <div class="paginator">
                        <ul class="pagination">
                            <?=$this->Paginator->first('<< ' . __('first'))?>
                            <?=$this->Paginator->prev('< ' . __('previous'))?>
                            <?=$this->Paginator->numbers()?>
                            <?=$this->Paginator->next(__('next') . ' >')?>
                            <?=$this->Paginator->last(__('last') . ' >>')?>
                        </ul>

                        <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
                    </div>
                </div>
    </div>
