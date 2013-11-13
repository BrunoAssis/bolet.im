<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($year['Year']['year'], '/years');
$this->Html->addCrumb('Períodos', '/periods/index/'.$year['Year']['id']);
$this->Html->addCrumb('Novo Período', '/periods/add/'.$year['Year']['id']);

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
		<legend><?php echo __('Novo Período'); ?></legend>
	<?php
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
		<li><?php echo $this->Html->link(__('Períodos'), array('action' => 'index', $year['Year']['id'])); ?></li>
	</ul>
</div>
