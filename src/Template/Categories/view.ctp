<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?><!--
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($category->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($category->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($category->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $category->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Realestates') ?></h4>
        <?php if (!empty($category->realestates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Type Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('ConvenienceGrade Id') ?></th>
                <th scope="col"><?= __('HeatingType Id') ?></th>
                <th scope="col"><?= __('ConditionOfProperty Id') ?></th>
                <th scope="col"><?= __('Parking Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Rooms Numbers') ?></th>
                <th scope="col"><?= __('Half Room Numbers') ?></th>
                <th scope="col"><?= __('Floor Number') ?></th>
                <th scope="col"><?= __('Floor Number Sum') ?></th>
                <th scope="col"><?= __('Floor Area') ?></th>
                <th scope="col"><?= __('Land Area') ?></th>
                <th scope="col"><?= __('Elevator') ?></th>
                <th scope="col"><?= __('External Storage') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Premium') ?></th>
                <th scope="col"><?= __('Visitors') ?></th>
                <th scope="col"><?= __('Built Year') ?></th>
                <th scope="col"><?= __('ZipCode') ?></th>
                <th scope="col"><?= __('State') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Street') ?></th>
                <th scope="col"><?= __('HouseNumber') ?></th>
                <th scope="col"><?= __('District') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->realestates as $realestates): ?>
            <tr>
                <td><?= h($realestates->id) ?></td>
                <td><?= h($realestates->user_id) ?></td>
                <td><?= h($realestates->type_id) ?></td>
                <td><?= h($realestates->category_id) ?></td>
                <td><?= h($realestates->convenienceGrade_id) ?></td>
                <td><?= h($realestates->heatingType_id) ?></td>
                <td><?= h($realestates->conditionOfProperty_id) ?></td>
                <td><?= h($realestates->parking_id) ?></td>
                <td><?= h($realestates->price) ?></td>
                <td><?= h($realestates->rooms_numbers) ?></td>
                <td><?= h($realestates->half_room_numbers) ?></td>
                <td><?= h($realestates->floor_number) ?></td>
                <td><?= h($realestates->floor_number_sum) ?></td>
                <td><?= h($realestates->floor_area) ?></td>
                <td><?= h($realestates->land_area) ?></td>
                <td><?= h($realestates->elevator) ?></td>
                <td><?= h($realestates->external_storage) ?></td>
                <td><?= h($realestates->comment) ?></td>
                <td><?= h($realestates->premium) ?></td>
                <td><?= h($realestates->visitors) ?></td>
                <td><?= h($realestates->built_year) ?></td>
                <td><?= h($realestates->zipCode) ?></td>
                <td><?= h($realestates->state) ?></td>
                <td><?= h($realestates->city) ?></td>
                <td><?= h($realestates->street) ?></td>
                <td><?= h($realestates->houseNumber) ?></td>
                <td><?= h($realestates->district) ?></td>
                <td><?= h($realestates->latitude) ?></td>
                <td><?= h($realestates->longitude) ?></td>
                <td><?= h($realestates->active) ?></td>
                <td><?= h($realestates->created) ?></td>
                <td><?= h($realestates->created_by) ?></td>
                <td><?= h($realestates->modified) ?></td>
                <td><?= h($realestates->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Realestates', 'action' => 'view', $realestates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Realestates', 'action' => 'edit', $realestates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Realestates', 'action' => 'delete', $realestates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $realestates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
-->

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
                                                <?=$entity["id"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("active")?> :</td>
                                            <td>
                                                <?php if (h($entity->active)==1) {
                                                        echo  "<span class='fas fa-check'></span>";
                                                        }else {
                                                            echo  "<span class='fas fa-times'></span>";
                                                        } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("Hungary")?> :</td>
                                            <td>
                                                <?=$entity["name"]?>
                                            </td>
                                        </tr>
                                                 <?=$this->I18n->i18nLabel($entity, 'name', ['class' => 'form-control']);?>                                           
                                        <tr>
                                            <td>
                                                <?=__("created")?> :</td>
                                            <td>
                                                <?=$entity["created"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("created_by")?> :</td>
                                            <td>
                                                <?=$entity["Ucreated_by"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("modified")?> :</td>
                                            <td>
                                                <?=$entity["modified"]?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?=__("modified_by")?> :</td>
                                            <td>
                                                <?=$entity["Umodified_by"]?>
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
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
