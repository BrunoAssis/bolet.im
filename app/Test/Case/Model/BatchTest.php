<?php
App::uses('Batch', 'Model');

/**
 * Batch Test Case
 *
 */
class BatchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.batch',
		'app.school',
		'app.created_user',
		'app.modified_user',
		'app.student',
		'app.user',
		'app.grade',
		'app.subject',
		'app.period',
		'app.course',
		'app.year'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Batch = ClassRegistry::init('Batch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Batch);

		parent::tearDown();
	}

}
