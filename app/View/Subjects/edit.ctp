<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb($this->request->data['Subject']['description'], '/subjects');
$this->Html->addCrumb('Editar', '/subjects/edit/'.$this->request->data['Subject']['id']);

?>
<div class="subjects form">
<?php echo $this->Form->create('Subject'); ?>
	<fieldset>
		<legend><?php echo __('Editar Disciplina'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description', array('label' => __('Descrição:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Subject.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('Subject.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Disciplinas'), array('action' => 'index')); ?></li>
	</ul>
</div>
