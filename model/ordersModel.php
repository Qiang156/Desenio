<?php

/**
 * Order model/service
 */
class WGR_OrdersModel
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
     * retrieves a list of unique customer names
     * where customers have purchased item number X within the last Y days.
     *
     * @param string $articleNumber
     * @param string $orderTime
	 * @return array
	 */
	public function getOrders(string $articleNumber, string $orderTime): array
    {
        $sql = 'SELECT DISTINCT clients.id, clients.name
            FROM orders
            INNER JOIN orderItem ON orderItem.orderID = orders.id
            INNER JOIN clients ON orders.clientID = clients.id
            WHERE UNIX_TIMESTAMP(orders.orderTime) >= ?
              AND orderItem.articleNumber = ?';

		return $this->model->dbFetchAllPrepared(
            $sql, array($orderTime, $articleNumber), PDO::FETCH_OBJ
        );
	}

}
