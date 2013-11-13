<?php
$this->extend('/Elements/containers/admin');

$this->Html->addCrumb('Escola', '/schools');

$this->start('script');
?>
<script>
$(function() {
	$schoolsTable = $('#school-table').dataTable({
		"bServerSide": true,
	    "bProcessing": true,
	    "sDom": '<"H"fr>t<"F"ip>',
	    "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'pagination')); ?>",
	    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
			oSettings.jqXHR = $.ajax({
				url: sUrl,
				data: aoData,
				success: function(data){
					fnCallback(data);
					$('#school-table a').tooltip();
				},
				dataType: "json",
				cache: false,
				type: 'POST'
			});
		},
		"fnServerParams": function ( aoData ) {
	        aoData.push( { "name": "dataTablesPagination", "value": true } );
		},
	    "aoColumns": [
			{ sTitle: 'Id', 		mData: "School.id", bVisible: false },
	        { sTitle: 'Escola', 	mData: "School.name" 				},
	        { sTitle: 'Ações', sWidth:'10%', mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.School.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('controller' => 'batches')); ?>/index/'+source.School.id+'" title="Turmas"><i class="icon-group"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('action' => 'schoolGrade')); ?>/'+source.School.id+'" title="Calcular Notas"><i class="icon-superscript"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#school-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $schoolsTable.fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.School.name+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.School.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
});
</script>

<?php $this->end(); ?>

<div class="schools index">
	<div class="header">
        <h2>
        	Escola
        </h2>
    </div>
	<table class="styled" id="school-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Nova Escola'), array('action' => 'add')); ?></li>
		</ul>
	</div>
</div>