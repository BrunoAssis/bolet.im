<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($school['School']['name'], '/schools');
$this->Html->addCrumb('Turmas', '/batches/index/'.$school['School']['id']);

$this->start('script');
?>
<script>
$(function() {
	$batchesTable = $('#batch-table').dataTable({
		"bServerSide": false,
	    "bProcessing": true,
	    "sDom": '<"H"fr>t',
	    "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'pagination')); ?>",
	    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
			oSettings.jqXHR = $.ajax({
				url: sUrl,
				data: aoData,
				success: function(data){
					fnCallback(data);
					$('#batch-table a').tooltip();
				},
				dataType: "json",
				cache: false,
				type: 'POST'
			});
		},
		"fnServerParams": function ( aoData ) {
	        aoData.push( { "name": "data[School][id]", "value": <?php echo $school['School']['id']; ?> } );
	        aoData.push( { "name": "data[Year][id]", "value": $('#BatchYearId').val() } );
		},
	    "aoColumns": [
			{ sTitle: 'Id', 		mData: "Batch.id", bVisible: false	},
	        { sTitle: 'Descrição', 	mData: "Batch.description" 			},
	        { sTitle: 'Curso', 		mData: "Course.description" 		},
	        { sTitle: 'Ações',sWidth:'10%',	 	mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.Batch.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('controller' => 'students')); ?>/index/'+source.Batch.id+'" title="Alunos"><i class="icon-user"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#batch-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $batchesTable.fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.Batch.description+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.Batch.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
	
	$('#BatchYearId').change(function() {
		$batchesTable.fnReloadAjax();
	});
});
</script>

<?php $this->end(); ?>

<div class="batches index">
	<div class="header">
        <h2>
        	Turmas
        </h2>
    </div>
    <div class="form">
    <?php
    	echo $this->Form->create('Batch');
		echo $this->Form->input('year_id', array('label' => 'Ano', 'options' => $years, 'value' => $this->Session->read('Auth.User.Year.id')));
		echo $this->Form->end();
    ?>
    </div>
	<table class="styled" id="batch-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Nova Turma'), array('action' => 'add', $school['School']['id'])); ?></li>
		</ul>
	</div>
</div>