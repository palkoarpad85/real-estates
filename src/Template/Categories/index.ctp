
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
    ['class' => 'btn btn-primary']
);?>
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
                            <th></th>
                            
                            <th> 
                            		
                            <label class="btn btn-primary btnradio"> 
                                <input type="radio" name="active" class="" value="true" <?php if(isset($active) && $active == true) echo "checked"; ?>>
                                <span class="fas fa-check"></span></input>
                            </label>
                            <label class="btn btn-primary btnradio"> 
                                <input type="radio" name="active" class=" " value="false" <?php if(isset($active) && $active == false) echo "checked"; ?>>
                                <span class="fas fa-times"></span></input>
                            </label>
 

                            </th>
                            <th><input type="text" class="form-control" id="name" name="name" value="<?php if(isset($name)) echo $name ?>" placeholder="Search..."></th>
                            <th><input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo $username ?>"  placeholder="Search..."></th> 
                            <th></th>                   
                            <th><button class="btn btn-success"><i class='fas fa-search'></i> <?=__("Search")?></button> 
                            <?=$this->Html->link(__("<i class='fas fa-times'></i> Reset"),
                            ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
                            ['class' => 'btn btn-danger ', 'escape' => false])?>
                            </th>
                        </tr>
                        <?= $this->Form->end();?>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('name', __("Name <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('username', __("Created by <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th class=""><?=__('Actions')?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $this->element('table'); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('active', __("Active <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('name', __("Name <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('username', __("Created by <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th class=""><?=__('Actions')?></th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
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
