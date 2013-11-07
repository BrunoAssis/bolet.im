<?php

$this->extend('/Elements/containers/login');

?>
<a href="comofunciona.html" class="saibamais">Saiba Mais</a>
		     
<section class="loginform cf">
	<?php
		$msg = $this->Session->flash().$this->Session->flash('auth');
		echo $this->Form->create('User');
		echo $this->Form->input('email', array('label' => __('E-mail'), 'placeholder' => 'e-mail@email.com', 'required' => true));
		echo $this->Form->input('password', array('label' => __('Senha'), 'placeholder' => __('digite sua senha'), 'required' => true));
		echo $msg;
		echo $this->Html->link('Esqueci a senha!', '#', array('class' => 'esqueci'));
		echo $this->Form->end('Entrar');
		
	?>
	<form id="cadform" style="display:none;" name="cadastro" action="index_submit.php" method="get" accept-charset="utf-8">  
	    <ul>  
	        <li><label for="usermail">E-mail</label>  
	        <input type="email" id="login" name="usermail" placeholder="e-mail@email.com" required></li>  
	        
	        <li>  
	         <input type="submit" id="btn_cad" value="Enviar" name="cadastrar"></li>  
	    </ul>  
	    
	</form> 
	
	
	<div class="resultado">...</div>
	
	<a href=""  class="cadastre">Cadastre-se Aqui!</a>
	
</section>
<?php $this->start('script'); ?>
<script>
	$(function(){
		$("#btn_login").click(function(){
			validaLogin($("#login"), $("#senha"));
		});
		
		$("a.cadastre").click(function (e) {
			e.preventDefault();
			$("#loginform").hide();
			$("#cadform").fadeIn("9000");
			$("a.cadastre").hide ();
		});
	});


	function validaLogin(login, senha){
		if(login.val() == ""){
			alert("Informe o login!");
			login.focus();
			return; 
		} else if(senha.val() == ""){
			alert("Informe a senha!");
			senha.focus();
			return;
		} else{
			$('#loginform').hide();
			$('.resultado').html("<img src='img/ajax-loader.gif' alt='ajax-loader' width='16' height='16'> Autenticando...").fadeIn("9000");
			
			$.post("UsuarioController.php", {login: login.val(), senha: senha.val()},
				function(retorno){
					if (retorno=="ok") {
			      		window.location = dashboard.html;
					} else {
						$(".resultado").html(retorno);
					}
				}
			);
		}
	}
</script>
<?php $this->end(); ?>