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
			array('id' => 1, 'parentID' => 0, 'name' => 'Andersson'),
			array('id' => 2, 'parentID' => 1, 'name' => 'Bengtsson'),
			array('id' => 3, 'parentID' => 2, 'name' => 'Claesson'),
			array('id' => 4, 'parentID' => 3, 'name' => 'Davidsson'),
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
