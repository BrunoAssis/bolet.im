<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($this->request->data['Year']['year'], '/years');
$this->Html->addCrumb($this->request->data['Period']['description'], '/periods/index/'.$this->request->data['Year']['id']);
$this->Html->addCrumb('Editar', '/periods/edit/'.$this->request->data['Period']['id']);

$this->start('script');
?>
<script>
	$(function() {
		$( "#PeriodStartDate" ).altFieldDatePicker();
		$( "#PeriodEndDate" ).altFieldDatePicker();
	});
</script>
<?php
$this->end();
?>
<div class="periods form">
<?php echo $this->Form->create('Period'); ?>
	<fieldset>
		<legend><?php echo __('Editar Período'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('order', array('label' => __('Ordem:')));
		echo $this->Form->input('description', array('label' => __('Descrição:')));
		echo $this->Form->input('abbr', array('label' => __('Abreviação:')));
		echo $this->Form->input('start_date', array('label' => __('Data Inicial'), 'type' => 'text'));
		echo $this->Form->input('end_date', array('label' => __('Data Final'), 'type' => 'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $this->Form->value('Period.id')), null, __('Deseja realmente deletar %s?', $this->Form->value('Period.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Períodos'), array('action' => 'index', $this->request->data['Period']['year_id'])); ?></li>
	</ul>
</div>
