<?php

$this->extend('/Elements/containers/admin');

$this->Html->addCrumb($student['School']['name'], '/schools');
$this->Html->addCrumb($student['Batch']['description'], '/batches/index/'.$student['School']['id']);
$this->Html->addCrumb($this->Html->returnShortName($student['Student']['name']), '/students/index/'.$student['Batch']['id']);

$this->Html->addCrumb('Notas', '/grades/add/'.$student['Batch']['id'].'/'.$student['Student']['id']);

?>
<div class="grades form">
<?php
echo $this->Form->create('Grade');

echo $this->Form->inputs(array(
		'legend' => 'Escolha o período',
		'period_id'   => array('label' => __('Período'), 'options' => $periods, 'empty' => 'Selecione')
	));

?>
	<fieldset>
		<legend><?php echo __('Notas'); ?></legend>
	</fieldset>
	<table class="styled" id="grade-add-table">
	</table>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>


<?php
$this->start('script');
?>
<script>
	$(function() {
		$gradeAddTable = $('#grade-add-table').dataTable({
		    bPaginate: false,
		    sDom: 't',
		    bServerSide: true,
		    iDeferLoading: true,
		    sAjaxSource: '<?php echo $this->Html->url(array('controller'=>'grades', 'action' => 'studentgrade')); ?>',
		    fnServerData: function( sUrl, aoData, fnCallback, oSettings ) {
				oSettings.jqXHR = $.ajax({
					url: sUrl,
					data: aoData,
					success: fnCallback,
					data: {data: {
							Student: {
								id: <?php echo $student['Student']['id']; ?>
							},
							Batch:{
								id: <?php echo $student['Batch']['id']; ?>
							},
							Period: {
								id: $('#GradePeriodId').val()
							}
						}},
					dataType: 'json',
					cache: false,
					type: 'POST'
				});
			},
		    aoColumns: [
				{ sTitle: 'Id',			mData: "Subject.id", bVisible: false 	},
		        { sTitle: 'Disciplina',	mData: "Subject.description" 					},
		        { sTitle: 'Nota', 		mData: "Grade.grade",		sClass: 'center nota',
					mRender: function(v, type, line){
						if (v == null) {
							v = '';
						}
						return '<input type="text" value="'+v+'" name="data[Grade][nota]['+line.Subject.id+']">';
					}
		        },
		    ],
		    "aaSorting": [[1, 'asc']]
		});
		
		$('#GradePeriodId').change(function(e) {
			$('#GradePeriodId').val($(this).val());
			$gradeAddTable.fnReloadAjax();
		}).change();
		
		$('#grade-add-table').delegate('input', 'keyup', function() {
			var v = $.nota.formataNumero($(this).val(), 3, 0, 10);
			$(this).val(v);
		});
	});
</script>
<?php
$this->end();
?>
<div class="actions">
	<h3><?php echo __('Ações'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Alunos'), array('controller' => 'students', 'action' => 'index', $student['Batch']['id'])); ?> </li>
	</ul>
</div>
