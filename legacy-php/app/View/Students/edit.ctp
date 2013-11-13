<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb($this->request->data['School']['name'], '/schools');
$this->Html->addCrumb($this->request->data['Batch']['description'], '/batches/index/'.$this->request->data['School']['id']);
$this->Html->addCrumb($this->Html->returnShortName($this->request->data['Student']['name']), '/students/index/'.$this->request->data['Batch']['id']);
$this->Html->addCrumb('Editar', '/students/edit/'.$this->request->data['Student']['id']);

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
		<legend><?php echo __('Editar Aluno'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Student.id')), null, __('Deseja realmente deletar o aluno %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Alunos'), array('action' => 'index', $this->request->data['Batch']['id'])); ?></li>
	</ul>
</div>
