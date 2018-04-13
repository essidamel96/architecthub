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

    <?= $this->Html->css('base.css') ?>
    <!--
    <?= $this->Html->css('cake.css') ?>
    -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('stylelogin.css') ?>
    <!--
    <link rel="stylesheet" href="css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="./css/fontawesome-all.css" />
    <link rel="stylesheet" href="css/styleprofil.css" />
    -->
    <?= $this->Html->script("jquery-3.3.1.js") ?>
    <?= $this->Html->script("bootstrap.js") ?>
    <!--
    <script src= "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity= "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin= "anonymous" ></script>
    <script src="js/bootstrap.js"></script>
    -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
 
  <div class="logo">
      <h1>Welcome</h1>
 </div>
        
         <div class="np">
          <input type="text" placeholder="Enter name"><br />
          <input type="password" placeholder="Enter Password"><br />
          </div>
         
          <input type="submit"class="b" value="Login"><br />

<?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?> <!-- dire à CakePHP où placer la sortie pour vos vues-->
    </div>
        
</body>

  </html>
  <!--
</body>
</html>
-->

