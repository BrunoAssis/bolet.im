<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb('Disciplina', '/subjects');
$this->start('script');
?>
<script>
$(function() {
	$subjectsTable = $('#subject-table').dataTable({
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
					$('#subject-table a').tooltip();
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
			{ sTitle: 'Id', 			mData: "Subject.id", bVisible: false },
	        { sTitle: 'Descrição', 		mData: "Subject.description" 				},
	        { sTitle: 'Ações',sWidth:'10%',	 	mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.Subject.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#subject-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $subjectsTable.dataTable().fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.Subject.description+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.Subject.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
});
</script>

<?php $this->end(); ?>

<div class="subjects index">
	<div class="header">
        <h2>
        	Disciplina
        </h2>
    </div>
	<table class="styled" id="subject-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Nova Disciplina'), array('action' => 'add')); ?></li>
		</ul>
	</div>
</div>