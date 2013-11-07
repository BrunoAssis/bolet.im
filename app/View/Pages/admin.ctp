<?php

$this->extend('/Elements/containers/admin');

?>
<div class="buttons">
	<div class="registerButtons">
		<a href="<?php echo $this->Html->url(array('controller' => 'years', 'action' => 'index')); ?>"> <span class="icon-calendar"></span> Ano Letivo </a>
		<a href="<?php echo $this->Html->url(array('controller' => 'schools', 'action' => 'index')); ?>"> <span class="icon-home"></span> Escola </a>
		<a href="<?php echo $this->Html->url(array('controller' => 'subjects', 'action' => 'index')); ?>"> <span class="icon-font"></span> Disciplina </a>
		<a href="<?php echo $this->Html->url(array('controller' => 'courses', 'action' => 'index')); ?>"> <span class="icon-list-alt"></span> Curso </a>
	</div>
</div>