<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($year['Year']['year'], '/years');
$this->Html->addCrumb('Períodos', '/periods/index/'.$year['Year']['id']);

$this->start('script');
?>
<script>
$(function() {
	$periodsTable = $('#period-table').dataTable({
		"bServerSide": false,
	    "bProcessing": true,
	    "sDom": '<"H"fr>t',
	    "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'pagination', $year['Year']['id'])); ?>",
	    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
			oSettings.jqXHR = $.ajax({
				url: sUrl,
				data: aoData,
				success: function(data){
					fnCallback(data);
					$('#period-table a').tooltip();
				},
				dataType: "json",
				cache: false,
				type: 'POST'
			});
		},
	    "aoColumns": [
			{ sTitle: 'Id', 			mData: "Period.id", bVisible: false },
	        { sTitle: 'Ordem', 			mData: "Period.order" 				},
	       	{ sTitle: 'Descrição',		mData: "Period.description" 		},
	       	{ sTitle: 'Abreviação',		mData: "Period.abbr" 				},
	       	{ sTitle: 'Data Inicial',	mData: "Period.start_date" 			},
	       	{ sTitle: 'Data Final',		mData: "Period.end_date" 			},
	        { sTitle: 'Ações',sWidth:'10%',	 	mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.Period.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#period-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $periodsTable.dataTable().fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.Period.description+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.Period.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
});
</script>

<?php $this->end(); ?>

<div class="periods index">
	<div class="header">
        <h2>
        	Período
        </h2>
    </div>
	<table class="styled" id="period-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Novo Período'), array('action' => 'add', $year['Year']['id'])); ?></li>
		</ul>
	</div>
</div>