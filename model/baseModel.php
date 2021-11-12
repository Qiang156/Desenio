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
	public function dbFetchAllPrepared(string $sql, array $params, int $fetchMode): array
    {
		return json_decode(json_encode(array(
			array('id' => 1, 'parentID' => 0, 'date'=>'2021-11-07', 'name' => 'Andersson'),
			array('id' => 2, 'parentID' => 1, 'date'=>'2021-11-09', 'name' => 'Bengtsson'),
			array('id' => 3, 'parentID' => 2, 'date'=>'2021-11-09', 'name' => 'Claesson'),
			array('id' => 4, 'parentID' => 3, 'date'=>'2021-11-10', 'name' => 'Davidsson'),
		)));
	}

    /**
     * Fetch data from API
     * @param string $url
     * @return array
     */
    public function fetchDataFromAPI(string $url): array
    {
        $headerArray = array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output,true);
    }
}
