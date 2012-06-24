<?php
App::uses('InvTypeReaction', 'EveOnlineApi.Model');

/**
 * InvTypeReaction Test Case
 *
 */
class InvTypeReactionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.inv_type_reaction');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InvTypeReaction = ClassRegistry::init('InvTypeReaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InvTypeReaction);

		parent::tearDown();
	}

}
