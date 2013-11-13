<?php

$this->extend('/Elements/containers/admin');

?>
<div class="years view">
<h2><?php  echo __('Year'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($year['Year']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($year['Year']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($year['Year']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User Id'); ?></dt>
		<dd>
			<?php echo h($year['Year']['created_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($year['Year']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User Id'); ?></dt>
		<dd>
			<?php echo h($year['Year']['modified_user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Year'), array('action' => 'edit', $year['Year']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Year'), array('action' => 'delete', $year['Year']['id']), null, __('Are you sure you want to delete # %s?', $year['Year']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Years'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Year'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Batches'), array('controller' => 'batches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Batch'), array('controller' => 'batches', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Batches'); ?></h3>
	<?php if (!empty($year['Batch'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Year Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($year['Batch'] as $batch): ?>
		<tr>
			<td><?php echo $batch['id']; ?></td>
			<td><?php echo $batch['school_id']; ?></td>
			<td><?php echo $batch['course_id']; ?></td>
			<td><?php echo $batch['year_id']; ?></td>
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
