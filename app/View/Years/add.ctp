<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb('Anos Letivos', '/years');
$this->Html->addCrumb('Novo', '/years/add/');

?>
<div class="years form">
<?php echo $this->Form->create('Year'); ?>
	<fieldset>
		<legend><?php echo __('Novo Ano'); ?></legend>
	<?php
		echo $this->Form->input('year', array('label' => __('Ano:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Anos'), array('action' => 'index')); ?></li>
	</ul>
</div>
