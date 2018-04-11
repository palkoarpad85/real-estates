<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'User';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
  
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('user.css') ?>
    <?= $this->Html->css('fontawesome-all.css') ?>
    <?= $this->Html->css('select2.min.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.js') ?>    
    
    <?= $this->Html->script('fontawesome-all.js') ?>
    <?= $this->Html->script('select2.full.min.js') ?>
    
     

    <?= $this->Html->script('user.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body> 
      
       
      <?= $this->element('navbar/top_menu_user'); ?> 

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
   
    <footer class="footer">
   
</footer>
</body>
</html>
