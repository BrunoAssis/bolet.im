<?php
if(!isset($jGrowl)){
	$options = array();
}else{
	$options = $jGrowl;
}
?>
<script>
	$(function(){
		$.jGrowl('<?php echo $message; ?>', <?php echo json_encode($options); ?>);
	});
</script>