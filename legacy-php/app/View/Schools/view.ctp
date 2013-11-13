<?php

$this->extend('/Elements/containers/admin');

?>
<div class="schools view">
<h2><?php  echo __('School'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($school['School']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($school['School']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($school['School']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User Id'); ?></dt>
		<dd>
			<?php echo h($school['School']['created_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($school['School']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User Id'); ?></dt>
		<dd>
			<?php echo h($school['School']['modified_user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit School'), array('action' => 'edit', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete School'), array('action' => 'delete', $school['School']['id']), null, __('Are you sure you want to delete # %s?', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Batches'); ?></h3>
	<?php if (!empty($school['Batch'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($school['Batch'] as $batch): ?>
		<tr>
			<td><?php echo $batch['id']; ?></td>
			<td><?php echo $batch['school_id']; ?></td>
			<td><?php echo $batch['course_id']; ?></td>
			<td><?php echo $batch['description']; ?></td>
			<td><?php echo $batch['created']; ?></td>
			<td><?php echo $batch['created_user_id']; ?></td>
			<td><?php echo $batch['modified']; ?></td>
			<td><?php echo $batch['modified_user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'batches', 'action' => 'view', $batch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'batches', 'action' => 'edit', $batch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'batches', 'action' => 'delete', $batch['id']), null, __('Are you sure you want to delete # %s?', $batch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Students'); ?></h3>
	<?php if (!empty($school['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Batch Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Students Registry'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($school['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['user_id']; ?></td>
			<td><?php echo $student['school_id']; ?></td>
			<td><?php echo $student['batch_id']; ?></td>
			<td><?php echo $student['name']; ?></td>
			<td><?php echo $student['birthdate']; ?></td>
			<td><?php echo $student['students_registry']; ?></td>
			<td><?php echo $student['created']; ?></td>
			<td><?php echo $student['created_user_id']; ?></td>
			<td><?php echo $student['modified']; ?></td>
			<td><?php echo $student['modified_user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'students', 'action' => 'view', $student['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'students', 'action' => 'delete', $student['id']), null, __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
