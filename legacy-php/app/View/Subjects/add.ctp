<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb('Disciplinas', '/subjects');
$this->Html->addCrumb('Nova Disciplina', '/subjects/add');

?>
<div class="subjects form">
<?php echo $this->Form->create('Subject'); ?>
	<fieldset>
		<legend><?php echo __('Nova disciplina'); ?></legend>
	<?php
		echo $this->Form->input('description', array('label' => __('Descrição:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Disciplinas'), array('action' => 'index')); ?></li>
	</ul>
</div>
