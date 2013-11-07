<div class="dados-aluno">
	<?php 
		echo $this->Html->image('noimage.jpg', array('width' => '190', 'height' => '160', 'alt' => 'noimage'));
	?>
	<ul class="dados">
		<li class="nome"><b>Aluno:</b> <span></span></li>
		<li class="ra"><b>R.A.:</b> <span></span></li>
	</ul>
	<div class="editar-perfil">
		<a href="#">
			<?php 
				echo $this->Html->image('editar.gif', array('alt' => 'Editar Perfil', 'width' => '16', 'height'=>'16'));
			?>
		</a>
	</div>
	<ul class="dados2">
		<li class="curso g"><b>Curso:</b> <span></span></li>
		<!--<li class="serie p">1º série </li>-->
		<li class="turma m"><b>Turma:</b> <span></span></li>
		<li class="numero m"><b>Nº:</b> <span></span></li>
		<li class="turno m"><b>Turno:</b> <span></span></li>
	</ul>
</div>