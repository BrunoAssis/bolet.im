<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($school['School']['name'], '/schools');
$this->Html->addCrumb('Nota Escola', '/schools/schoolGrade/'.$school['School']['id']);
?>
<div class="schools-grade form">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo __('Calcular Nota Escola'); ?></legend>
	<?php
		echo $this->Form->input('period_id', array('label' => __('Período:'), 'options' => $periods, 'empty' => 'Selecione'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Escolas'), array('action' => 'index')); ?></li>
	</ul>
</div>
