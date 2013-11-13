<?php

$this->extend('/Elements/containers/admin');

?>
<div class="periods view">
<h2><?php  echo __('Period'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($period['Period']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($period['Period']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbr'); ?></dt>
		<dd>
			<?php echo h($period['Period']['abbr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($period['Period']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($period['Period']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($period['Period']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($period['Period']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created User Id'); ?></dt>
		<dd>
			<?php echo h($period['Period']['created_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($period['Period']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified User Id'); ?></dt>
		<dd>
			<?php echo h($period['Period']['modified_user_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Period'), array('action' => 'edit', $period['Period']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Period'), array('action' => 'delete', $period['Period']['id']), null, __('Are you sure you want to delete # %s?', $period['Period']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Periods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Period'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades'), array('controller' => 'grades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grade'), array('controller' => 'grades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Grades'); ?></h3>
	<?php if (!empty($period['Grade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Subject Id'); ?></th>
		<th><?php echo __('Batch Id'); ?></th>
		<th><?php echo __('Period Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created User Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($period['Grade'] as $grade): ?>
		<tr>
			<td><?php echo $grade['id']; ?></td>
			<td><?php echo $grade['student_id']; ?></td>
			<td><?php echo $grade['subject_id']; ?></td>
			<td><?php echo $grade['batch_id']; ?></td>
			<td><?php echo $grade['period_id']; ?></td>
			<td><?php echo $grade['grade']; ?></td>
			<td><?php echo $grade['created']; ?></td>
			<td><?php echo $grade['created_user_id']; ?></td>
			<td><?php echo $grade['modified']; ?></td>
			<td><?php echo $grade['modified_user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'grades', 'action' => 'view', $grade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'grades', 'action' => 'edit', $grade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'grades', 'action' => 'delete', $grade['id']), null, __('Are you sure you want to delete # %s?', $grade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grade'), array('controller' => 'grades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
