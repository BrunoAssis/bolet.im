<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($this->request->data['School']['name'], '/schools');
$this->Html->addCrumb('Editar', '/schools/edit/'.$this->request->data['School']['id']);
?>
<div class="schools form">
<?php echo $this->Form->create('School'); ?>
	<fieldset>
		<legend><?php echo __('Editar Escola'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => __('Escola:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('School.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('School.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Escolas'), array('action' => 'index')); ?></li>
	</ul>
</div>
