<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($this->request->data['School']['name'], '/schools');
$this->Html->addCrumb($this->request->data['Batch']['description'], '/batches/index/'.$this->request->data['Batch']['school_id']);
$this->Html->addCrumb('Editar', '/batches/edit/'.$this->request->data['Batch']['id']);

?>
<div class="batches form">
<?php echo $this->Form->create('Batch'); ?>
	<fieldset>
		<legend><?php echo __('Editar Turma'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description', array('label' => __('Descrição:')));
		echo $this->Form->input('course_id', array('label' => __('Curso:'), 'options'=>$courses, 'empty' => 'Selecione'));
		echo $this->Form->input('year_id', array('label' => __('Ano:'), 'options'=>$years, 'empty' => 'Selecione'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Batch.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('Batch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Turmas'), array('action' => 'index', $this->request->data['Batch']['school_id'])); ?></li>
	</ul>
</div>
