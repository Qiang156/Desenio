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
	public function getMembers(string $type): array
    {
		return $this->model->dbFetchAllPrepared(
			'SELECT id, parentID, name 
			FROM members
			WHERE type = ?', array($type), PDO::FETCH_OBJ);
	}

    /**
     * @param string $type
     * @return array
     */
    public function getMembersWithParents(string $type): array
    {
        $list = $this->model->dbFetchAllPrepared(
            'SELECT id, parentID, name 
			FROM members
			WHERE type = ?', array($type), PDO::FETCH_OBJ);
        $data = [];
        foreach ($list as $val) {
            $data[$val->id] = $val;
        }
        foreach ($list as $val) {
            if ( $val-> parentID === 0 ) {
                $tmp = [];
            } else {
                $tmp = $this->getParents($data, $data[$val->parentID]);
            }
            $val->parent = [];
            while($tmp) {
                $val->parent[] = $tmp['name'] ?? '';
                $tmp = $tmp['parent'] ?? [];
            }
        }
        unset($data, $tmp);
        return $list;
    }

    /**
     *
     * @param $data
     * @param $obj
     * @return array
     */
    private function getParents($data, $obj): array
    {
        if ( $obj->parentID !== 0 ) {
            $tree = [
                'name' => $obj->name,
                'parent' => $this->getParents($data, $data[$obj->parentID])
            ];
        } else {
            $tree = ['name' => $obj->name];
        }
        return $tree;
    }

}
