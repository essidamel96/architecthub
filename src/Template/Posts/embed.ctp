<?php
$this->layout = null;
?>
    <?= $this->Html->script("jquery-3.3.1.js") ?><!-- importation de jQuery-->

    <?= $this->Html->script('three/three.js'); ?>
    <?= $this->Html->script('three/controls/OrbitControls.js'); ?>
    <?= $this->Html->script('three/controls/DeviceOrientationControls.js'); ?>
    <?= $this->Html->script('three/loaders/GLTFLoader.js'); ?>
    <?= $this->Html->script('viewer.js'); ?>
         <div style="width:100%; height:100%;overflow:hidden" class="viewer" id="viewer" data-src="/files/Posts/photo/<?= $post->photo ?>"></div>
