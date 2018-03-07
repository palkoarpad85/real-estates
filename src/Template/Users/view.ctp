<?php
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
                                                <?=h ($realEstatesCount) ?>
                                            </a>
                                        </li>

                                        <li>
                                            <b class="text-left">
                                                <?=__("Active Realestates count: "); ?>
                                            </b>
                                            <?=h ($realEstatesActiveCount["count"]) ?>
                                                </a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <hr>
                                        <li>
                                            <b class="text-left">
                                                <?=__("email "); ?>
                                            </b>
                                            <?=h ($entity["email"]) ?>
                                                </a>
                                        </li>
                                        <li>
                                            <b class="text-left">
                                                <?=__("biography "); ?>
                                            </b>
                                            <?=h ($entity["biography"]) ?>
                                                </a>
                                        </li>
                                    </ul>

                                </div>
                                
                            </div>
                            


                        </div>

                        <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <!-- Post -->
                                    <?php 
                            
                            foreach ($entity["realestates"]  as $value) {
                                print_r($value["id"]);
                            }?>
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="pull-right btn-box-tool">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome tools to help create
                                            filler text for everyone from bacon lovers to Charlie Sheen fans.
                                        </p>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-share margin-r-5"></i> Share</a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o margin-r-5"></i> Comments (5)
                                                </a>
                                            </li>
                                        </ul>

                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="pull-right btn-box-tool">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome tools to help create
                                            filler text for everyone from bacon lovers to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="form-group margin-bottom-none">
                                                <div class="col-sm-9">
                                                    <input class="form-control input-sm" placeholder="Response">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="pull-right btn-box-tool">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <ul class="list-inline">
                                            <li>
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-share margin-r-5"></i> Share</a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o margin-r-5"></i> Comments (5)
                                                </a>
                                            </li>
                                        </ul>

                                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane " id="timeline">
                                    <!-- The timeline -->
                                    <ul class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <li class="time-label">
                                            <span class="bg-red">
                                                10 Feb. 2014
                                            </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-envelope bg-blue"></i>

                                            <div class="timeline-item">
                                                <span class="time">
                                                    <i class="fa fa-clock-o"></i>
                                                </span>

                                                <h3 class="timeline-header">
                                                    <a href="#">Support Team</a> sent you an email</h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora
                                                    plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a class="btn btn-primary btn-xs">Read more</a>
                                                    <a class="btn btn-danger btn-xs">Delete</a>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <i class="fa fa-clock-o bg-gray"></i>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div>

                    </div>
                </section>
            </div>
        </div>
    </div>
