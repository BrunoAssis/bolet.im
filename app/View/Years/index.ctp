<?php
$this->extend('/Elements/containers/admin');

$this->Html->addCrumb('Ano Letivo', '/years');
$this->start('script');
?>
<script>
$(function() {
	$yearsTable = $('#year-table').dataTable({
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
					$('#year-table a').tooltip();
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
			{ sTitle: 'Id', 		mData: "Year.id", bVisible: false	},
	        { sTitle: 'Ano', 		mData: "Year.year" 					},
	        { sTitle: 'Ações',sWidth:'10%',	 	mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.Year.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('controller' => 'periods')); ?>/index/'+source.Year.id+'" title="Períodos"><i class="icon-reorder"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#year-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $yearsTable.dataTable().fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.Year.year+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.Year.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
});
</script>

<?php $this->end(); ?>

<div class="years index">
	<div class="header">
        <h2>
        	Ano
        </h2>
    </div>
	<table class="styled" id="year-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Novo Ano'), array('action' => 'add')); ?></li>
		</ul>
	</div>
</div>
