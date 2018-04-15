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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;



$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

<?= $this->Html->css('stylehome.css') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    
</head>
<body class="home">


<div class="product-wrap">
  <h1>3D World</h1>
  <p>creativity without limit</p>
</div>
<div class="cube-wrapper">
  <div class="cube">
    <div class="top"></div>
    <div class="left"></div>
    <div class="right"></div>
  </div>
  <div class="cube2">
    <div class="top"></div>
    <div class="left"></div>
    <div class="right"></div>
  </div>
  <div class="cube3">
    <div class="top"></div>
    <div class="left"></div>
    <div class="right"></div>
  </div>
</div>
<form action="Posts" method="post">
    <input type="submit" class="b" value="START NOW">
</form>

<!--<a href="Posts" class="button">START NOW</a>-->

</body>
</html>
