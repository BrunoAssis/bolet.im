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
		echo $this->Html->css('jquery-ui-1.10.3.custom');
		echo $this->Html->css('jquery.jgrowl');
		echo $this->Html->css('font-awesome/css/font-awesome');
		?>
	
	</head>
	<body<?php echo (isset($class) ? ' class="'.$class.'"' : ''); ?>>
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>css/main.css
        <![endif]-->
        
        <?php echo $this->fetch('content'); ?>
	
		<?php echo $this->element('footer'); ?>
	        
	        
		<?php
		
			echo $this->Html->script('vendor/modernizr-2.6.2.min');
			echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
			?>
			<script>window.jQuery || document.write('<script src="<?php echo $this->Html->url('/'.JS_URL);?>vendor/jquery-1.9.1.min.js"><\/script>')</script>
			<?php
			echo $this->Html->script('vendor/jquery.dataTables');
			echo $this->Html->script('vendor/jquery-ui-1.10.3.custom');
			echo $this->Html->script('vendor/jquery.maskedinput');
			echo $this->Html->script('vendor/jquery.jgrowl');
		?>
			
		
		<?php
			echo $this->Html->script('plugins');
			echo $this->Html->script('main');
			echo $this->fetch('script');
			$msg = $this->Session->flash();
			if (!empty($msg)) {
		?>
			<script>
				$(function(){
					$.jGrowl('<?php echo $msg; ?>');
				});
			</script>
		<?php
			}
        /*<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>*/
        ?>
    </body>
	
</html>