<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($school['School']['name'], '/schools');
$this->Html->addCrumb('Turmas', '/batches/index/'.$school['School']['id']);
$this->Html->addCrumb('Nova Turma', '/batches/add/'.$school['School']['id']);

?>
<div class="batches form">
<?php echo $this->Form->create('Batch'); ?>
	<fieldset>
		<legend><?php echo __('Nova turma'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('Turmas'), array('action' => 'index', $school['School']['id'])); ?></li>
	</ul>
</div>
