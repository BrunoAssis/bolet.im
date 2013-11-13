<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($this->request->data['Course']['abbr'], '/courses');
$this->Html->addCrumb('Editar', '/courses/edit/'.$this->request->data['Course']['id']);

?>
<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Editar Curso'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Course.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('Course.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Cursos'), array('action' => 'index')); ?></li>
	</ul>
</div>
