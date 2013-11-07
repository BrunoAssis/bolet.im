<?php
App::uses('SchoolsGrade', 'Model');

/**
 * SchoolsGrade Test Case
 *
 */
class SchoolsGradeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.schools_grade',
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
		$this->SchoolsGrade = ClassRegistry::init('SchoolsGrade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SchoolsGrade);

		parent::tearDown();
	}

}
