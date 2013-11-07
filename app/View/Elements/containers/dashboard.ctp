<header class="header">
	<?php
		echo $this->Html->image('minilogo.png', array('alt' => 'logo', 'width' =>'100', 'height' =>'100', 'class' => 'logo'));
	?>
	<dir class="welcome">Olá, Alberto. Fechamos o ano letivo de 2013</dir>
	<ul class="menu">
		<li><a href="#">Boletim Informativo</a></li>
		<li>
			<?php echo $this->Html->link('..de Desempenho', '/painel'); ?>
			<ul class="submenu">
				<li><a href="#">Resultados</a></li>
				<li><a href="#">Definir Metas</a></li>
			</ul>	        	
		</li>
		<li><a href="mibstorio.html">..de miBs</a></li>
		<li><a href="oportunidades.png">Para você</a></li>
		<li class="sair"><?php echo $this->Html->link('Sair', '/logout'); ?></li>
	</ul>
</header>
<span class="paper"></span>
<section class="mid">
	<div class="wrapper">
		<?php echo $this->fetch('content'); ?>
	</div>
	<div  class="clearfix"></div>
</section>
<span class="paper-bottom"></span>