<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
 */
?>
<?php $this->layout = 'admin';?>

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
                        <?=__("<i class='fas fa-plus'></i> Edit ".$this->name)?>
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
                                    <?=__('Add a '.$this->name)?>
                                </h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?=$this->Form->create($entity)?>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <?=$this->Form->control('phoneNumber', ['class'   => 'form-control',
                                                                                  'label'     => _('Phone Number'),
                                                                                  'data-mask' =>'00 00 000 0000'
                                                                                 
                                                                             ])?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <?=$this->Form->button(__d('admin', '{0} Save Phone', '<i class="fa fa-plus"></i>'), ['class' => ' btn btn-success'])?>
                                </div>
                                <?=$this->Form->end()?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div id="accordianId" role="tablist" aria-multiselectable="true" style="width:100%">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="section1HeaderId">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                                    <?=__("Realestates")?>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                                            <div class="card-body">
                                                <div class="row font-weight-bold">
                                                    <div class="col-md-1">
                                                        Id
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?= __('active')?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?= __('city')?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=__('street')?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?=__('created')?>
                                                    </div>
                                                </div>
                                                <?php foreach ($entity->realestates as $realestate): ?>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?=h($realestate->id)?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?php if (h($realestate->active)==1) {
                                                                    echo  "<span class='fas fa-check'></span>";
                                                                    }else {
                                                                        echo  "<span class='fas fa-times'></span>";
                                                                    } ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=h($realestate->city)?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=h($realestate->street)?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=h($realestate->created)?>
                                                    </div>
                                                    
                                                </div>


                                                <?php endforeach;?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

<?= $this->Html->script('jquery.mask.min.js') ?>
