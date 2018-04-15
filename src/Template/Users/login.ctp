<!DOCTYPE html>
<html>

<?php
$this->layout = null;
$this->assign('title', "Login");
?>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>

    
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <!--
    <?= $this->Html->css('cake.css') ?>
    -->
    <?= $this->Html->css('stylelogin.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
 
  <div class="logo">
      <h1>Welcome</h1>
 </div>
        
         <div class="np">
         
<?= $this->Flash->render() ?>
    
         <form action="" method="post">
          <input type="text" name="username" placeholder="Enter name"><br />
          <input type="password" name="password" placeholder="Enter Password"><br />
          </div>
         
          <input type="submit" class="b" value="Login"><br />

</form> 
</body>

  </html>
  





