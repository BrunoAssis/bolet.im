<header class="home-header">
    <?php echo $this->Html->image('logo-home.png', array('width' => '294', 'height' => '185', 'alt' => 'Logotipo')); ?>
</header>

<section class="home-mid">
	<div class="home-wrapper">
    	<?php echo $this->fetch('content'); ?>
	</div>
</section>