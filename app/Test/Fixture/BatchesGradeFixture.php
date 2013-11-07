<?php
/**
 * BatchesGradeFixture
 *
 */
class BatchesGradeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'subject_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'batch_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'period_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'grade' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '5,3'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'batch_grade_subject' => array('column' => 'subject_id', 'unique' => 0),
			'batch_grade_batch' => array('column' => 'batch_id', 'unique' => 0),
			'batch_grade_period' => array('column' => 'period_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'subject_id' => 1,
			'batch_id' => 1,
			'period_id' => 1,
			'grade' => 1,
			'created' => '2013-07-22 11:15:31',
			'created_user_id' => 1,
			'modified' => '2013-07-22 11:15:31',
			'modified_user_id' => 1
		),
	);

}
