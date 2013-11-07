<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb('Cursos', '/courses');
$this->Html->addCrumb('Novo Curso', '/courses/add');

?>
<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Novo Curso'); ?></legend>
	<?php
		echo $this->Form->input('level', array('label' => __('Nível:')));
		echo $this->Form->input('description', array('label' => __('Descrição:')));
		echo $this->Form->input('abbr', array('label' => __('Abreviação:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Cursos'), array('action' => 'index')); ?></li>
	</ul>
</div>
