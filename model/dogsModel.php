<?php

/**
 * Members model/service
 */
class WGR_DogsModel
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
     * Fetch breed list from API: https://dog.ceo/dog-api/
     * @param string $breed
     * @return array
     */
    public function getBreeds(string $breed): array
    {
        $data = $this->model->fetchDataFromAPI("https://dog.ceo/api/breed/".$breed."/list");
        if ( $data['status'] === 'success' ) {
            return $data['message'];
        } else {
            return [];
        }
    }


}
