<?php

/**
 * Members model/service
 */
class WGR_MembersModel
{
	/**
	 * @var WGR_BaseModel
	 */
	private $model;

	/**
	 * @param WGR_BaseModel $model
	 */
	public function __construct(WGR_BaseModel $model)
	{
		$this->model = $model;
	}

	/**
	 * @param string $type
	 * @return array
	 */
	public function getMembers($type)
	{
		return $this->model->dbFetchAllPrepared(
			'SELECT id, name
			FROM members
			WHERE type = ?', array($type), PDO::FETCH_OBJ);
	}
}
