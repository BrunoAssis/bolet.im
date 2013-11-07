<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Bolet.im</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <?php
        	echo $this->Html->css('normalize');
			echo $this->Html->css('main');
        ?>
    </head>
    <body class="dashboard">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p></div>css/main.css
        <![endif]-->

        <!-- Add your site or application content here -->
        <header class="header">
	        <img class="logo" src="img/minilogo.png" alt="logo" width="100" height="100">
	        <dir class="welcome">Olá, Alberto. Fechamos o ano letivo de 2013</dir>
	        <ul class="menu">
	        	<li><a href="#">Boletim Informativo</a></li>
	        	<li><a href="painel.html">..de Desempenho</a>
		        	<ul class="submenu">
		        		<li><a href="#">Resultados</a></li>
		        		<li><a href="#">Definir Metas</a></li>
	        		</ul>	        	
	        	</li>
	        	<li><a href="mibstorio.html">..de miBs</a></li>
	        	<li><a href="oportunidades.png">Para você</a></li>
	        	<li class="sair"><a href="#" >Sair</a></li>
	         </ul>
        </header>
        <span class="paper"></span>
        <section class="mid">
        	<div class="wrapper">
		<div class="dados-aluno">
			<?php 
				echo $this->Html->image('noimage.jpg');
				$medalha = $this->Html->image('medal-gold-3-icon.png');
			?>
			<ul class="dados">
				<li class="nome"><b>Aluno:</b> Alberto Silva </li>
				<li class="ra"><b>R.A.:</b> 9087987987 </li>
			</ul>
			<div class="editar-perfil">
				<a href="#">
					<img width="16" height="16" alt="Editar Perfil" src="img/editar.gif">
				</a>
			</div>
			<ul class="dados2">
				<li class="curso g"><b>Curso:</b> Ensino Médio </li>
				<li class="serie p">1º série </li>
				<li class="turma m"><b>Turma:</b> B </li>
				<li class="numero m"><b>Nº:</b> 30 </li>
				<li class="turno m"><b>Turno:</b> Manhã </li>
			</ul>
		</div>
		<div class="filtro">
			<div class="filtro-campo">
				Disciplina:</br>
				<select name="filtro"> 
				  <option value="portugues" >L. Portuguesa</option>
				  <option value="matematica" >Matemática</option>
				  <option value="fisica" >Física</option>
				</select>
			</div>
			<div class="filtro-campo">
				Bimestre:</br>
				<select name="filtro"> 
				  <option value="1" >1º Bim.</option>
				  <option value="2" >2º Bim.</option>
				  <option value="3" >3º Bim.</option>
				  <option selected="" value="4" >4º Bim. Atual</option>
				</select>
			</div>
			<a class="anterior" href="#">+ Histórico (anos anteriores)</a>
			<h3>L. Portuguesa</h3>
		</div>
				
		<div class="media"> 
			<h4>Desempenho do Aluno</h4>
			<select name="desenpenho"> 
			  <option value="ab" >Avaliação Bimestral</option>
			  <option value="ma" >Média Acumulada</option>
			  <option value="cf" >Conceito Final</option>
			</select>
			<div class="obs"></div>
			<div class="nota-media2"> 8</div>
		</div>
		<div class="medias"> 
			<div class="media"> 
				<h4>Desempenho da Turma</h4>
				<div class="obs">12º de 30 alunos</div>				
				<div class="nota-media turma"> 7,50</div>
				<div class="obs2">* Compõem este grupo os alunos da ($sala) da escola ($nome escola)</div>
			</div>
			<div class="media">
				<h4>Desempenho da ($serie)</h4>
				<div class="obs">33º de 92 alunos</div>
				<div class="nota-media serie"> 7,00</div>
				<div class="obs2">* Compõem este grupo os alunos da série da escola ($nome escola)</div>
			</div>
		</div>
		<div class="grafico">
			<?php echo $this->Html->image('grafico.jpg'); ?>
		</div>
		<div class="boletim"> 
			<h4>Boletim Escolar 2013</h4>					
			<table cellspacing="0" summary="Boletim">
				<thead>
					<tr>
						<th class="disc">Disciplina</th>
						<th class="bim" colspan="2">1º Bim</th>
						<th class="bim" colspan="2">2º Bim</th>
						<th  class="bim" colspan="2">3º Bim</th>
						<th  class="bim" colspan="2">4º Bim</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>L. Portuguesa</td>
						<td class="center">7</td>
						<td class="center"> </td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">8</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Geografia</td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">8 </td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">9</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>História</td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">8</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Matemática</td>
						<td class="center">5</td>
						<td class="center">-</td>
						<td class="center">8 </td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">6</td>
						<td class="center">-</td>
					</tr>
					<tr>
						<td>Inglês</td>
						<td class="center">8</td>
						<td class="center">-</td>
						<td class="center">8</td>
						<td class="center">-</td>
						<td class="center">9</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">10</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Arte</td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">9</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">9</td>
						<td class="center"></td>
					</tr>
					<tr>
						<td>Sociologia</td>
						<td class="center">5</td>
						<td class="center">-</td>
						<td class="center">6</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">8</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">9</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Biologia</td>
						<td class="center">4</td>
						<td class="center">-</td>
						<td class="center">6</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">8</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Física</td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">5</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">6</td>
						<td class="center">-</td>
					</tr>
					<tr>
						<td>Química</td>
						<td class="center">5</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">7</td>
						<td class="center">-</td>
						<td class="center">9</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Filosofia</td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">8</td>
						<td class="center"><?php echo $medalha; ?></td>
						<td class="center">6</td>
						<td class="center">-</td>
						<td class="center">7</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
					<tr>
						<td>Ed. Física</td>
						<td class="center">8</td>
						<td class="center">-</td>
						<td class="center">8</td>
						<td class="center">-</td>
						<td class="center">8</td>
						<td class="center">-</td>
						<td class="center">10</td>
						<td class="center"><?php echo $medalha; ?></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td>Média</td>
						<td class="center">6,17</td>
						<td class="center"></td>
						<td class="center">7,00</td>
						<td class="center"></td>
						<td class="center">7,33</td>
						<td class="center"></td>
						<td class="center">8,25</td>
						<td class="center"></td>
					</tr>
				</tfoot>
			</table>
			<div class="legenda">
				<?php echo $medalha." Melhorou o desempenho"; ?>
			</div>
		</div>
		<div class="quadro">
			<?php echo $this->Html->image('quadro-de-avisos.jpg'); ?>
		</div>
		<map id="imgmap201363184723" name="imgmap201363184723">
			<area shape="rect" alt="" title="" coords="293,192,381,208" href="http://www.fundacaolemann.org.br/khanportugues/#fisica" target="_blank" />
			<area shape="rect" alt="" title="" coords="107,401,208,417" href="http://www.fundacaolemann.org.br/khanportugues/#matematica" target="_blank" />
		</map>
	</div>
    <div  class="clearfix"></div>
        </section>
        <span class="paper-bottom"></span>
        <footer>
	        <div class="answer"><p>© 2013 Bolet.im Ltd. | Termos de uso | Política de privacidade | <a href="comofunciona.html" target="_blank">Como Funciona</a></p></div>
	        <div class="social">
	        </div>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.lightbox_me.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>
        	$(document).ready(function() {
	        	$('.verranking').click(function(e) {
					$('.popup-ranking').lightbox_me();
		    		e.preventDefault();
	    		});
    		});
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>