
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
    <li  class="breadcrumb-item active" aria-current="page"><?=__("<i class='fa fa-outdent'></i> Phones",
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
                        <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('phoneNumber', __("Phone Number <i class='fa fa-sort'></i>"), ['escape' => false])?></th>                           
                            <th><?=$this->Paginator->sort('created', __("Created <i class='fa fa-sort'></i>"), ['escape' => false])?></th>
                            <th class=""><?=__('Actions')?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo $this->element('tables/tablePhones'); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><?=$this->Paginator->sort('id', __("Id <i class='fa fa-sort'></i>"), ['escape' => false])?></td>
                            <th><?=$this->Paginator->sort('phoneNumber', __("Phone Number <i class='fa fa-sort'></i>"), ['escape' => false])?></th>                           
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






