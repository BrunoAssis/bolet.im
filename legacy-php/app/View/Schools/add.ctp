<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb('Escolas', '/schools');
$this->Html->addCrumb('Nova Escola', '/schools/add');

?>
<div class="schools form">
<?php echo $this->Form->create('School'); ?>
	<fieldset>
		<legend><?php echo __('Nova Escola'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => __('Escola:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Escolas'), array('action' => 'index')); ?></li>
	</ul>
</div>
