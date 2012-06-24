<?php
App::uses('CrtCertificate', 'EveOnlineApi.Model');

/**
 * CrtCertificate Test Case
 *
 */
class CrtCertificateTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.eve_online_api.crt_certificate');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CrtCertificate = ClassRegistry::init('CrtCertificate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CrtCertificate);

		parent::tearDown();
	}

}
