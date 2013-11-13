<?php
App::uses('BatchesGrade', 'Model');

/**
 * BatchesGrade Test Case
 *
 */
class BatchesGradeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.batches_grade',
		'app.subject',
		'app.grade',
		'app.student',
		'app.user',
		'app.school',
		'app.batch',
		'app.course',
		'app.year',
		'app.period'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BatchesGrade = ClassRegistry::init('BatchesGrade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BatchesGrade);

		parent::tearDown();
	}

}
