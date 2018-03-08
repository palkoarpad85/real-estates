<?php
use Cake\I18n\Number;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
    <?php $this->layout = 'admin';?>
    <div class="content">

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
            <div class="container-fluid">
                <section class="content">

                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="box box-primary" style="background-color:#eee;">
                                <div class="box-body box-profile">
                                    <div class=" text-center">
                                        <?= $this->Html->image($entity["avatar"], ['alt' => 'CakePHP','class'=>'profile_img']); ?>
                                    </div>
                                    <h3 class="profile-username text-center">
                                        <?=h($entity["last_name"])?>
                                            <?=h($entity["first_name"])?>
                                    </h3>
                                    <h4 class="profile-username text-center">
                                        <?=h($entity["username"])?>
                                    </h4>
                                    <hr>
                                    <ul>
                                        <li>
                                            <b class="text-left">
                                                <?=__("Realestates count: "); ?>
                                            </b>
                                            <a class="text-right">
                                                <?=h($realEstatesCount) ?>
                                            </a>
                                        </li>

                                        <li>
                                            <b class="text-left">
                                                <?=__("Active Realestates count: "); ?>
                                            </b>
                                            <?=h($realEstatesActiveCount["count"]) ?>
                                                </a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <hr>
                                        <li>
                                            <b class="text-left">
                                                <?=__("email "); ?>
                                            </b>
                                            <?=h($entity["email"]) ?>
                                                </a>
                                        </li>
                                        <li>
                                            <b class="text-left">
                                                <?=__("biography "); ?>
                                            </b>
                                            </li>
                                            <li>
                                            <?= $this->Text->truncate(h($entity["biography"]),
                                      100,
                                      [
                                       'ellipsis' => '...',
                                       'exact' => false,
                                       'class'=>'max-width'
                                      ]) ?>
                                                </a>
                                        </li>
                                    </ul>

                                </div>
                                
                            </div>
                            


                        </div>

                        <div class="col-md-9 ">
                        <div class="nav-tabs-custom">
                          <h2><?= __("My ads")?></h2>                  
            <div class="tab-content">
              
              <div class="tab-pane active" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  
                
                <?php foreach ($entity['realestates'] as  $value) { ?>
                <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          <?=  $this->Time->format(
                            $value->created,
                            'yyyy.MM.dd',
                            null                            
                            );?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <li>
                    <div class="timeline-item">
                      <span class="time"><i class="fas fa-clock"></i> <?=  $this->Time->format(
                            $value->created,
                            'HH:mm',
                            null                            
                            );?></span>
                            <div class="timeline-header">
                            <h5 class="timeline-header"><b> <?=$value["type"]['name'] ?></b> <?=$value["state"] ?> <?= _("State") ?> <?=$value["city"] ?> <?=$value["street"] ?></h5>
                            
                         </div>
                      <div class="timeline-body">
                          <h5><?=__("Price: ")?> <?= Number::format($value["price"], [
                                'locale' => \Cake\I18n\I18n::locale()
                        ]); ?> <?=__('HUF')?></h5>
                       <?= $value["comment"]?>
                      </div>
                      <div class="timeline-footer">
                        
              <?=$this->Html->link( __("<i class='far fa-user'></i> View"),
               ['plugin' => false,'controller'=>'Realestates','action' => 'view', $value["id"]],
                ['class'=>'btn btn-primary btn-xs', 'escape' => false])?>     
                        
                      </div>
                    </div>
                  </li>
                  
               <?php } ?>
                  
           
 
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

                        </div>


                   
                </section>
            </div>
        </div>
    </div>
