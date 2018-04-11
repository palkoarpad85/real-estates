<div id="wrapper">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav  justify-content-end rigth_menu">
                <li class="nav-item active">
                    <?=$this->Html->link( __("<i class='far fa-user'></i> Ads"), ['plugin' => false,'controller'=>'Realestates','action' => 'add'], ['class'=>'nav-link ', 'escape' => false])?>
                </li>
                <li class="nav-item active">
                    <?=$this->Html->link( __("<i class='far fa-user'></i> Profile"), ['plugin' => false,'controller'=>'Users','action' => 'profile'], ['class'=>'nav-link ', 'escape' => false])?>
                </li>
                <li class="nav-item">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $this->Html->image(
                                          'languages/'.\Cake\I18n\I18n::locale().'.jpg',
                                          [
                                              'class' => 'flag',
                                              'alt' => \Cake\I18n\I18n::locale()
                                          ]
                                      )?>
                                <?=\Cake\Core\Configure::read('I18n.locales.' . \Cake\I18n\I18n::locale()) ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <?php foreach (\Cake\Core\Configure::read('I18n.locales') as $key => $value): ?>
                            <?php if (\Cake\I18n\I18n::locale() != $key): ?>
                            <?= $this->Html->link(
                                        $this->Html->image(
                                          'languages/'.$key.'.jpg',
                                          [
                                              'class' => 'flag ',
                                              'alt' => \Cake\Core\Configure::read('I18n.locales.' . $key)
                                          ]
                                      ) . '&nbsp;' . $value,
                                        [
                                            '_name' => 'set-lang',
                                            'lang' => $key
                                        ],
                                        [
                                            'class'=>'dropdown-item',
                                            'escape' => false
                                        ]
                                    ) ?>

                                <?php endif;?>
                                <?php endforeach;?>
                        </div>
                    </li>


                </li>
                <?php if(isset($current_user["username"])){ ?>
                <li class="nav-item ">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $current_user["username"]; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                        <?=$this->Html->link( __("<i class='far fa-user'></i> Profile"), ['plugin' => false,'controller'=>'Users','action' => 'profile'], ['class'=>'dropdown-item', 'escape' => false])?>
                            <?=$this->Html->link( __("<i class='far fa-share-square'></i> Logout"), ['plugin' => false,'controller'=>'Users','action' => 'logout'], ['class'=>'dropdown-item', 'escape' => false])?>
                    </div>
                </li>
                <?php }
            else{ ?>
                <li class="nav-item active">
                    <?=$this->Html->link( __("<i class='far fa-user'></i> Login"), ['plugin' => false,'controller'=>'Users','action' => 'login'], ['class'=>'nav-link', 'escape' => false])?>
                </li>
                <?php }?>
            </ul>
        </div>
    </nav>
</div>
