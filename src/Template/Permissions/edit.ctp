<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
    <?php $this->layout = 'admin';?>
    <div class="categories form large-9 medium-8 columns content">
        
            <section class="content-header">
                <h2>
                    <?=__('Edit a '.$this->name)?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-tachometer-alt'></i> Home"),
                                ['plugin' => false, 'controller' => 'Realestates', 'action' => 'dashboard'],
                                ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-outdent'></i> ".$this->name),
                                ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
                                ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?=__("<i class='fas fa-plus'></i> Add ".$this->name)?>
                        </li>
                    </ol>
                </nav>
            </section>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <?=$this->Flash->render();?>
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="hr-divider hr-divider-panel">
                                    <h3 class="hr-divider-content hr-divider-heading">
                                        <?=__('Edit a '.$this->name)?>
                                    </h3>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?=$this->Form->create($entity)?>
                                <div class="form-group">
                                        <div class="col-sm-5"><?php
                                        echo $this->Form->control('roles._ids', ['class' => 'form-control js-multiple', 'multiple'=>'multiple', 'label' =>__('Roles'),'options' => $roles]); ?>
                                        </div>

                               </div>
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <?=$this->Form->input('contoller', ['class' => 'form-control', 'label' => __('Controller')])?>
                                        </div>
                                    </div>
                                    <div class="form-group">                                     
                                    <div class="col-sm-5">
                                            <?=$this->Form->input('view', ['class' => 'form-control', 'label' => __('View')])?>
                                        </div>                                 
                                    <br>
                                    <div class="form-group ">
                                  <?=$this->Form->button(__d('admin', '{0} Save Permissions', '<i class="fa fa-plus"></i>'), ['class' => ' btn btn-success'])?>
                                </div><?=$this->Form->end()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    $(document).ready(function() {
    $('.js-multiple').select2();
});
</script>