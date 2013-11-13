<?php
App::uses('Period', 'Model');

/**
 * Period Test Case
 *
 */
class PeriodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.period',
		'app.grade',
		'app.student',
		'app.subject',
		'app.batch',
		'app.school',
		'app.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Period = ClassRegistry::init('Period');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Period);

		parent::tearDown();
	}

}
