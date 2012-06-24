<?php
App::uses('EveOnlineApiAppModel', 'EveOnlineApi.Model');
/**
 * StaStationType Model
 *
 */
class StaStationType extends EveOnlineApiAppModel {
/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'evedump';
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'staStationTypes';
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'stationTypeID';
}
