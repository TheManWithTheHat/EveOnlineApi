<?php
App::uses('CrpNPCCorporationResearchField', 'EveOnlineApi.Model');

/**
 * CrpNPCCorporationResearchField Test Case
 *
 */
class CrpNPCCorporationResearchFieldTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crp_n_p_c_corporation_research_field');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrpNPCCorporationResearchField = ClassRegistry::init('CrpNPCCorporationResearchField');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrpNPCCorporationResearchField);

		parent::tearDown();
	}

}
