<?php

/**
 * Base model/service class
 */
class WGR_BaseModel
{
	/**
	 * Mockup for database fetchAll
	 * @param string $sql
	 * @param array $params
	 * @param int $fetchMode
	 * @return array
	 */
	public function dbFetchAllPrepared($sql, $params, $fetchMode)
	{
		return json_decode(json_encode(array(
			array('id' => 1, 'parentID' => 0, 'name' => 'Andersson'),
			array('id' => 2, 'parentID' => 1, 'name' => 'Bengtsson'),
			array('id' => 3, 'parentID' => 2, 'name' => 'Claesson'),
			array('id' => 4, 'parentID' => 3, 'name' => 'Davidsson'),
		)));
	}
}
