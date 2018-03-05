<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
 
  
        <?php $this->layout = 'admin';?>
        <div class="categories form large-9 medium-8 columns content">

            <section class="content-header">
                <h2>
                    <?=__('View a ' . $this->name)?>
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-tachometer-alt'></i> Home"),
    ['plugin' => false, 'controller' => 'Realestates', 'action' => 'dashboard'],
    ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <?=$this->Html->link(__("<i class='fa fa-outdent'></i> " . $this->name),
    ['plugin' => false, 'controller' => $this->name, 'action' => 'index'],
    ['class' => 'breadcrumb-item ', 'escape' => false])?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?=__("<i class='fas fa-plus'></i> View " . $this->name)?>
                        </li>
                    </ol>
                </nav>
            </section>
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <table class="table table-{1:striped|sm|bordered|hover|inverse} table-inverse table-responsive">
                                    <thead class="thead-inverse|thead-default">
                                        <tr>
                                            <th colspan="2">
                                                <h2>
                                                    <?=__($this->name)?>
                                                </h2>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Id:</td>
                                            <td>
                                                <?=$permission["id"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("active")?> :</td>
                                            <td>
                                                <?php if (h($permission->active)==1) {
                                                        echo  "<span class='fas fa-check'></span>";
                                                        }else {
                                                            echo  "<span class='fas fa-times'></span>";
                                                        } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("controller")?> :</td>
                                            <td>
                                                <?=$permission["contoller"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("view")?> :</td>
                                            <td>
                                                <?=$permission["view"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("created")?> :</td>
                                            <td>
                                                <?=$permission["created"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("created_by")?> :</td>
                                            <td>
                                                <?=$permission["Ucreated_by"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("modified")?> :</td>
                                            <td>
                                                <?=$permission["modified"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("modified_by")?> :</td>
                                            <td>
                                                <?=$permission["Umodified_by"]?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div id="accordianId" role="tablist" aria-multiselectable="true" style="width:100%">
                                    <div class="card">
                                        <div class="card-header" role="tab" id="section1HeaderId">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                                    <?=__("Roles")?>
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
                                                        <?= __('name')?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=__('created')?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?=__('Action')?>
                                                    </div>
                                                </div>
                                                <?php foreach ($permission->roles as $roles): ?>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?=h($roles->id)?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?php if (h($roles->active)==1) {
                                                                    echo  "<span class='fas fa-check'></span>";
                                                                    }else {
                                                                        echo  "<span class='fas fa-times'></span>";
                                                                    } ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=h($roles->name)?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?=h($roles->created)?>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <?= $this->Html->link(__('View'), ['controller'=>'roles','action' => 'view', $roles->id]) ?>
                                                    </div>
                                                </div>


                                                <?php endforeach;?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
