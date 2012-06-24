<?php
/**
 * CrtRecommendationFixture
 *
 */
class CrtRecommendationFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'crtRecommendations';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'recommendationID' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'shipTypeID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'certificateID' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'recommendationLevel' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'indexes' => array('PRIMARY' => array('column' => 'recommendationID', 'unique' => 1), 'crtRecommendations_IX_certificate' => array('column' => 'certificateID', 'unique' => 0), 'crtRecommendations_IX_shipType' => array('column' => 'shipTypeID', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'recommendationID' => 1,
			'shipTypeID' => 1,
			'certificateID' => 1,
			'recommendationLevel' => 1
		),
	);
}
