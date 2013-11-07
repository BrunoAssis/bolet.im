<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb($batch['School']['name'], '/schools');
$this->Html->addCrumb($batch['Batch']['description'], '/batches/index/'.$batch['Batch']['school_id']);
$this->Html->addCrumb('Alunos', '/students/index/'.$batch['Batch']['id']);
$this->Html->addCrumb('Novo', '/students/add/'.$batch['Batch']['id']);

$this->start('script');
?>
<script>
	$(function() {
		$( "#StudentBirthdate" ).altFieldDatePicker();
	});
</script>
<?php
$this->end();
?>
<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('Novo Aluno'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => __('Nome:')));
		echo $this->Form->input('birthdate', array('label' => __('Data de Nascimento:'), 'type' => 'text'));
		echo $this->Form->input('students_registry', array('label' => __('R.A.:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Alunos'), array('action' => 'index', $batch['Batch']['id'])); ?></li>
	</ul>
</div>
