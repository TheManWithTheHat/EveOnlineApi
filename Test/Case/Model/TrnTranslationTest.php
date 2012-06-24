<?php
App::uses('TrnTranslation', 'EveOnlineApi.Model');

/**
 * TrnTranslation Test Case
 *
 */
class TrnTranslationTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TrnTranslation = ClassRegistry::init('TrnTranslation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TrnTranslation);

		parent::tearDown();
	}

}
