<?php

$this->extend('/Elements/containers/admin');
$this->Html->addCrumb($batch['School']['name'], '/schools');
$this->Html->addCrumb($batch['Batch']['description'], '/batches/index/'.$batch['Batch']['school_id']);
$this->Html->addCrumb('Alunos', '/students/index/'.$batch['Batch']['id']);

$this->start('script');
?>
<script>
$(function() {
	$studentsTable = $('#student-table').dataTable({
		"bServerSide": false,
	    "bProcessing": true,
	    "sDom": '<"H"fr>t',
	    "sAjaxSource": "<?php echo $this->Html->url(array('action' => 'pagination', $batch['Batch']['id'])); ?>",
	    "fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
			oSettings.jqXHR = $.ajax({
				url: sUrl,
				data: aoData,
				success: function(data){
					fnCallback(data);
					$('#student-table a').tooltip();
				},
				dataType: "json",
				cache: false,
				type: 'POST'
			});
		},
	    "aoColumns": [
			{ sTitle: 'Id', 			mData: "Student.id", bVisible: false 	},
	        { sTitle: 'Aluno', 			mData: "Student.name" 					},
	        { sTitle: 'Data Nascimento',mData: "Student.birthdate" 				},
	        { sTitle: 'R.A.', 			mData: "Student.students_registry" 		},
	        { sTitle: 'Usuário', 		mData: "User.email" 				},
	        { sTitle: 'Ações',sWidth:'10%',	 	mData: function(source) {
	        									var actions = '';
	        								    actions += '<a href="<?php echo $this->Html->url(array('action' => 'edit')); ?>/'+source.Student.id+'" title="Editar"><i class="icon-pencil"></i></a>';
								        		actions += '<a class="excluir" title="Excluir" href="#"><i class="icon-remove"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('controller' => 'grades', 'action' => 'add')); ?>/'+<?php echo $batch['Batch']['id']; ?>+'/'+source.Student.id+'" title="Notas"><i class="icon-sort-by-order-alt"></i></a>';
								        		actions += '<a href="<?php echo $this->Html->url(array('action' => 'view')); ?>/'+source.Student.id+'" title="Ver" target="_blank"><i class="icon-eye-open"></i></a>';
								        		return actions;
									},
	        sClass:"center", bSortable: false}
	    ],
	    "aaSorting": [[1, 'asc']]
	});
	
	$('#student-table').delegate('a.excluir', 'click', function(e) {
		e.preventDefault(e);
		var data = $studentsTable.dataTable().fnGetData($(e.target).closest('tr')[0]);
		if (confirm('Deseja realmente deletar '+data.Student.name+'?')) {
			$('<form method="post" action="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data.Student.id+'"><input type="hidden" name="_method" value="POST"></form>').appendTo('body').submit();
		} 
		e.returnValue = false;
		return false;
	});
});
</script>

<?php $this->end(); ?>

<div class="students index">
	<div class="header">
        <h2>
        	Aluno
        </h2>
    </div>
	<table class="styled" id="student-table">
		<thead>
		</thead>
		<tbody>
		</tbody>
	</table>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Novo Aluno'), array('action' => 'add', $batch['Batch']['id'])); ?></li>
		</ul>
	</div>
</div>