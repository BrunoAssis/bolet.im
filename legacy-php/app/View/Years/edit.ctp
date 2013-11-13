<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb($this->request->data['Year']['year'], '/years');
$this->Html->addCrumb('Editar', '/years/edit/'.$this->request->data['Year']['id']);

?>
<div class="years form">
<?php echo $this->Form->create('Year'); ?>
	<fieldset>
		<legend><?php echo __('Editar Ano'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('year', array('label' => __('Ano:')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Year.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('Year.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Anos'), array('action' => 'index')); ?></li>
	</ul>
</div>
