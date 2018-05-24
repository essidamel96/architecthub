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

$cakeDescription = 'CakePHP: the rapid development php framework';

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?><!-- -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?> <!-- -->

    <!--
    
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('fontawesome-all.css') ?>
    <?= $this->Html->css('styleprofil.css') ?>
    <!--
    <link rel="stylesheet" href="css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="./css/fontawesome-all.css" />
    <link rel="stylesheet" href="css/styleprofil.css" />
    -->
    <?= $this->Html->script("jquery-3.3.1.js") ?><!-- importation de jQuery-->
    <?= $this->Html->script("bootstrap.js") ?><!--importation js de bootstrap -->
    <!--
    <script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity= "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin= "anonymous" ></script>
    <script src="js/bootstrap.js"></script>
    -->
    <?= $this->fetch('meta') ?> <!-- -->
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>

            <div class="navbar  navbar-fixed-top"><!--navbar-header-->
            <div class="container-fluid">   
                        <a class="navbar-brand" href="/"><font size='6px'color='black'><i><i class="fas fa-cubes"></i>&nbsp;Digital</i></font><font size='17px'color='black'><i>FAB</i></font><br><small><font color='black'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See the world in 3D</font></smal></a>
                      
                  
                      <!-- Collect the nav links, forms, and other content for toggling -->
                    <!--    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
                        <ul class="nav navbar-nav  navbar-right">
                          <li class="active"><a href="/"><font>Accueil</font></a></li>
                         <li class=""><?= $this->Html->link(__('Posts'), ['action' => 'index', 'controller' => 'posts']) ?></li>

                          <?php if ($this->request->session()->read('Auth.User')) : ?>
                          
                          <li class=""><?= $this->Html->link(__('Profil'), ['action' => 'view', 'controller' => 'users']) ?></li>
                         
                          
                            <li><?= $this->Html->link(__('New Post'), ['action' => 'add', 'controller' => 'posts']) ?></li>
                      

                         
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                             
                              <li role="separator" class="divider"></li>
                              <li><a href="<?= $this->Url->build(["controller" => "Users", "action" => "logout"]) ?>">Deconnexion</a></li>
                            </ul>
                          </li>

                          

                          <?php else: ?>
                          <!-- la méthode link(), qui générera un lien HTML avec le texte fourni (le premier paramètre) et l’URL (le second paramètre). -->
                          <li class=""><?= $this->Html->link(__('Login'), ['action' => 'login', 'controller' => 'users']) ?></li>
                          <li class=""><?= $this->Html->link(__('Register'), ['action' => 'add', 'controller' => 'users']) ?></li>
                          <?php endif ?>
                        </ul>
                      </div><!-- /.navbar-collapse -->
        </div>
        </div>
        </header>  
    <?= $this->Flash->render() ?>
    <!--<div class="container clearfix">  -->
        <?= $this->fetch('content') ?>
   <!-- </div>-->
    <footer>
    </footer>
</body>
</html>
