<ul class="navbar-nav  justify-content-end rigth_menu">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="far fa-envelope"></i></a>
          </li>
          <li class="nav-item">
           
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <li class="nav-item ">
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <?php if(isset($current_user["username"])){echo $current_user["username"];}else{echo __("Login");} ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
              <?=$this->Html->link( __("<i class='far fa-user'></i> Profile"), ['plugin' => false,'controller'=>'Users','action' => 'profile'], ['class'=>'dropdown-item', 'escape' => false])?>     
              <?=$this->Html->link( __("<i class='far fa-share-square'></i> Logout"), ['plugin' => false,'controller'=>'Users','action' => 'logout'], ['class'=>'dropdown-item', 'escape' => false])?>
              </div>

          </li>
        </ul>
      </div>
</nav>