<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
    <?php $this->layout = 'admin';?>
    <div class="Users form large-9 medium-8 columns content">

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
                        <div class="col-md-3" >

                            <!-- Profile Image -->
                            <div class="box box-primary" style="background-color:blue;">
                                <div class="box-body box-profile">
                                     

                                    <h3 class="profile-username text-center">Nina Mcintire</h3>

                                     
                                    
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                              
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9"   >
                            <div class="nav-tabs-custom"  style="background-color:blue;">
                                <ul class="nav nav-tabs">
                                    <li class="">
                                        <a href="#activity" data-toggle="tab" aria-expanded="false">Activity</a>
                                    </li>
                                    <li class="active">
                                        <a href="#timeline" data-toggle="tab" aria-expanded="true">Timeline</a>
                                    </li>
                                    <li class="">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                             Post
                                        </div>
                                        <!-- /.post -->

                                         

                                        
                                    </div>
                                   
                                     
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div>
                         
                    </div>
                </section>
            </div>
        </div>
    </div>
