<?php

$this->extend('/Elements/containers/dashboard');

echo $this->element('student_data');
$medalha = $this->Html->image('medal-gold-3-icon.png', array('width' => '24', 'height' => '24', 'alt' => 'medal-gold-3-icon'));

?>
<div class="filtro">
	<div class="filtro-campo">
		Disciplina:</br>
		<select name="filtro" id="subjects">
		</select>
	</div>
	<div class="filtro-campo">
		Bimestre:</br>
		<select name="filtro" id="periods">
		</select>
	</div>
	<a class="anterior" href="#">+ Histórico (anos anteriores)</a>
	<h3 id="subject"></h3>
</div>
				
<div class="media"> 
	<h4>Desempenho do Aluno</h4>
	<select name="desenpenho" id="type"> 
	  <option value="P" >Avaliação Bimestral</option>
	  <option value="A" >Média Acumulada</option>
	  <option value="F" >Conceito Final</option>
	</select>
	<div class="obs"></div>
	<div class="nota-media2" id="grade"></div>
</div>

<div class="medias"> 
	<div class="media"> 
		<h4>Desempenho da Turma</h4>
		<div class="obs"><span id="batchRanking">-</span> de <span id="batchStudentsNumber">-</span> alunos</div>				
		<div class="nota-media turma" id="batchGrade">-</div>
		<div class="obs2">* Compõem este grupo os alunos da <span class="batch"></span> da escola <span class="school"></span></div>
	</div>
	<div class="media">
		<h4>Desempenho da <span id="courseAbbr"></span></h4>
		<div class="obs"><span id="schoolRanking">-</span> de <span id="schoolStudentsNumber">-</span> alunos</div>
		<div class="nota-media serie" id="schoolGrade">-</div>
		<div class="obs2">* Compõem este grupo os alunos da série <span id="courseAbbr"></span> da escola <span class="school"></span></div>
	</div>
</div>

<div class="grafico">
	<div id="evolutionGraph" style="width: 980px; height: 416px;"></div>
	<ul>
		<li class="legendStudent"><span></span>Você</li>
		<li class="legendBatch"><span></span>Sua Turma</li>
		<li class="legendSchool"><span></span>Sua Escola</li>
	</ul>
</div>

<div class="boletim">
	<h4>Boletim Escolar 2013</h4>
	<table cellspacing="0" summary="Boletim">
		<thead>
			<tr>
				<th class="disc">Disciplina</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			<tr>
				<td>Média</td>
			</tr>
		</tfoot>
	</table>
	<div class="legenda">
		<?php echo $medalha." Melhorou o desempenho"; ?>
	</div>
</div>

<div class="quadro">
	<?php echo $this->Html->image('quadro-de-avisos.jpg', array('usemap' => '#imgmap201363184723')); ?>
</div>
<map id="imgmap201363184723" name="imgmap201363184723">
	<area shape="rect" alt="" title="" coords="293,192,381,208" href="http://www.fundacaolemann.org.br/khanportugues/#fisica" target="_blank" />
	<area shape="rect" alt="" title="" coords="107,401,208,417" href="http://www.fundacaolemann.org.br/khanportugues/#matematica" target="_blank" />
</map>
<?php
	$this->start('script');
	$this->Html->script('vendor/flot/jquery.flot', array('inline' => false));
	$this->Html->script('vendor/flot/jquery.flot.categories', array('inline' => false));
?>
<script>
	$(function() {
		
		var periods = {},
			currentPeriod;
		
		$('#periods').change(function() {
			currentPeriod = setPeriod(periods, $(this).val());
			$('#subjects').change();
		})
		
		$('#subjects').change(function() {
			setGrade(currentPeriod, $(this).val(), $('#type').val());
		});
		
		$('#type').change(function() {
			$('#subjects').change();
		});
		
		function getData(periodId) {
			var data = null;
				data = {
					'data[Student][id]': <?php echo $student['Student']['id']; ?>
				};
			
			$.ajax({
				type: 'POST',
				dataType: 'json',
				async: true,
				data: data,
				url: '<?php echo $this->Html->url(array('action' => 'data')); ?>',
				success: function(d) {
					var periodIdAux;
					periods = d.data.Grades;
					identification(d);
					fillComboPeriodsAndReportCard(periods, d.data.Period.id);
					$('#periods').change();
				}
			});
		}
		
		function setPeriod(periods, periodId) {
			if (periods[periodId].Grade) {
				return periods[periodId];
			}
			
			return {};
		}
		
		function setGrade(currentPeriod, subjectId, type) {
			var subject = '-',
				grade = '-',
				batchGrade = '-',
				schoolGrade = '-',
				batchRanking = '-',
				schoolRanking = '-',
				batchStudentsNumber = '-',
				schoolStudentsNumber = '-',
				graphType = null;
			
			if (type == 'P') {
				if (currentPeriod.Grade[subjectId]) {
					var Grade = currentPeriod.Grade[subjectId];
					
					subject = Grade.Subject.description;
					grade = formatGrade(Grade.grade);
					batchGrade = formatGrade(Grade.batch_grade);
					schoolGrade = formatGrade(Grade.school_grade);
					batchRanking = Grade.batch_ranking+'º';
					schoolRanking = Grade.school_ranking+'º';
					batchStudentsNumber = Grade.batch_students_number;
					schoolStudentsNumber = Grade.school_students_number;
					
					graphType = 'periodGrade';
				}
			} else if(type == 'A') {
				if (currentPeriod.CumulativeAvg[subjectId]) {
					var Grade = currentPeriod.Grade[subjectId],
						Avg = currentPeriod.CumulativeAvg[subjectId];
						
					subject = Grade.Subject.description;
					grade = formatGrade(Avg.grade);
					batchGrade = formatGrade(Avg.batch_cumulative_avg);
					schoolGrade = formatGrade(Avg.school_cumulative_avg);
					batchRanking = Avg.batch_ranking+'º';
					schoolRanking = Avg.school_ranking+'º';
					batchStudentsNumber = Grade.batch_students_number;
					schoolStudentsNumber = Grade.school_students_number;
					
					graphType = 'avgGrade';
				}
			}
			
			if (graphType != null) {
				setGraph(subjectId, graphType);
			} else {
				unsetGraph();
			}
			
			$('#subject').text(subject);
			$('#grade').text(grade);
			$('#batchGrade').text(batchGrade);
			$('#schoolGrade').text(schoolGrade);
			$('#batchRanking').text(batchRanking);
			$('#schoolRanking').text(schoolRanking);
			$('#batchStudentsNumber').text(batchStudentsNumber);
			$('#schoolStudentsNumber').text(schoolStudentsNumber);
		}
		
		function setGraph(subjectId, type) {
			var student = [],
				batch = [],
				school = [],
				options;
			
			if (type == 'periodGrade') {
				$.each(periods, function(i, period) {
					var abbr = period.Period.abbr,
						subject = (period.Grade[subjectId] ? period.Grade[subjectId] : {}),
						grade = (subject.grade ? subject.grade*1 : null),
						batch_grade = (subject.batch_grade ? subject.batch_grade*1 : null),
						school_grade = (subject.school_grade ? subject.school_grade*1 : null);
					
					student.push([abbr, grade]);
					batch.push([abbr, batch_grade]);
					school.push([abbr, school_grade]);
				});
			} else if (type == 'avgGrade') {
				$.each(periods, function(i, period) {
					var abbr = period.Period.abbr,
						subject = (period.CumulativeAvg[subjectId] ? period.CumulativeAvg[subjectId] : {}),
						grade = (subject.grade ? subject.grade*1 : null),
						batch_grade = (subject.batch_cumulative_avg ? subject.batch_cumulative_avg*1 : null),
						school_grade = (subject.school_cumulative_avg ? subject.school_cumulative_avg*1 : null);
					
					student.push([abbr, grade]);
					batch.push([abbr, batch_grade]);
					school.push([abbr, school_grade]);
				});
			}
			
			options = {
				xaxis: {
					mode: "categories",
					font: {
					    size: 15,
					    lineHeight: 40,
					    color: "#696969"
					}
				},
				yaxis: {
					tickFormatter: function(val, axis) {
						return formatGrade(val);
					},
					max: 10,
					font: {
					    size: 16,
					    color: "#696969"
					}
				},
				points: { show: true},
				lines: { show: true},
				colors: ['#2A388F', '#006738', '#F7931D'],
				grid: {
				    show: true,
				    labelMargin: 10,
				    hoverable: true
				}
			}
			$('#evolutionGraph').show();
			$.plot('#evolutionGraph', [ student, batch, school	], options);
		}
		
		function unsetGraph(){
			$('#evolutionGraph').hide();
		}
		
		function formatGrade(grade) {
			if (grade == null) {
				return '-';
			}
			grade = grade*1;
			return grade.toFixed(2).toString().replace('.', ',');
		}
		
		function identification(d) {
			var $dados = $('.dados'),
				$nome = $dados.find('.nome span'),
				$ra = $dados.find('.ra span'),
				$dados2 = $('.dados2'),
				$curso = $dados2.find('.curso span'),
				$turma = $dados2.find('.turma span'),
				$numero = $dados2.find('.numero span'),
				$turno = $dados2.find('.turno span'),
				$school = $('.school'),
				$batch = $('.batch'),
				$courseAbbr = $('#courseAbbr');
				
			$nome.text(d.data.Student.name);
			$ra.text(d.data.Student.students_registry);
			$curso.text(d.data.Course.description);
			$turma.text(d.data.Batch.description);
			$numero.text('a');
			$turno.text('a');
			$school.text(d.data.School.name);
			$batch.text(d.data.Batch.description);
			$courseAbbr.text(d.data.Course.abbr);
		}
		
		function fillComboPeriodsAndReportCard(p, currentPeriodId) {
			var $select = $('#periods'),
				$reportCardTable = $('.boletim table:first'),
				$reportCardTableHeader = $reportCardTable.find('thead tr'),
				$reportCardTableBody = $reportCardTable.find('tbody'),
				$reportCardTableFooter = $reportCardTable.find('tfoot tr'),
				subjects = {},
				numberOfSubjects = 0;
				lastSubjectsGrades = {},
				medal = '<?php echo $medalha; ?>',
				subjectsAverage = {};
			$select.html('');
			$.each(p, function(i, o) {
				var current = '',
					selected = '';
				subjectsAverage[o.Period.id] = 0;
				if (o.Period.id == currentPeriodId) {
					current = ' <?php echo __('Atual'); ?>';
					selected = ' selected="selected"';
				}
				$select.append('<option'+selected+' value="'+o.Period.id+'">'+o.Period.description+current+'</option>');
				
				if (o.Grade) {
					$.each(o.Grade, function(i, obj) {
						subjects[obj.Subject.id] = obj.Subject.description
					});
				}
				
				$reportCardTableHeader.append('<th class="bim" colspan="2">'+o.Period.abbr+'</th>');
				
			});
			
			fillComboSubjects(subjects);
			
			$.each(subjects, function(subjectId, subject) {
				var cells = '';
				numberOfSubjects++;
				$.each(p, function(i, o) {
					var grade = '',
					writeMedal = '-';
					
					if (o.Grade && o.Grade[subjectId] && o.Grade[subjectId].grade) {
						subjectsAverage[o.Period.id] += (o.Grade[subjectId].grade * 1);
						grade = formatGrade(o.Grade[subjectId].grade);
						
						if (lastSubjectsGrades[subjectId] && lastSubjectsGrades[subjectId] < o.Grade[subjectId].grade) {
							writeMedal = medal;
						}
						
						lastSubjectsGrades[subjectId] = o.Grade[subjectId].grade;
					} else {
						delete(lastSubjectsGrades[subjectId]);
					}
					
					cells += '<td class="center">' + grade + '</td>'+
							 '<td class="center">' + writeMedal + '</td>';
					
				});
				$reportCardTableBody.append(
					'<tr>'+
						'<td>'+subject+'</td>'+
						 cells +
					'</tr>'
				);
			});
			
			
			$.each(subjectsAverage, function(i, sum) {
				var html = '<td class="center"></td><td class="center"></td>',
					gradeAverage = formatGrade((sum/numberOfSubjects).toFixed(2));
				if (numberOfSubjects > 0 && sum > 0) {
					html = '<td class="center">'+gradeAverage+'</td><td class="center"></td>';
				}
				$reportCardTableFooter.append(html);
			});
		}
		
		function fillComboSubjects(subjects) {
			var $select = $('#subjects'),
				isSelected = true;
			$select.html('');
			$.each(subjects, function(i, subject) {
				var selected = '';
				if (isSelected) {
					selected = ' selected="selected"';
					isSelected = false;
				}
				$select.append('<option'+selected+'  value="'+i+'">'+subject+'</option>');
			});
		}
		
		getData();
	});
</script> 
<?php $this->end();?>