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

    /**
     * Returns the number of orders per date,
     * between two specified dates.
     * The result must also contain dates where there are 0 orders.
     *
     * @param $startDate
     * @param $endDate
     * @return array
     */
    public function getOrderCountBetweenTwoDays($startDate,$endDate): array
    {
        $start = strtotime($startDate);
        // The last sec of a day should be the next day.
        $end = strtotime($endDate) + 86400 - 1;
        $data = $this->model->dbFetchAllPrepared(
            "SELECT DATE(orderTime) as date, COUNT(orderTime) as number
                FROM orders 
                WHERE UNIX_TIMESTAMP(orderTime) BETWEEN ? AND ?
                GROUP BY date 
                ORDER BY date ASC",
            array($start, $end), PDO::FETCH_OBJ
        );

        $result = [];
        for ( $time = $start; $time <= $end; $time += 86400 ) {
            $date = date('Y-m-d', $time);
            $result[$date] = 0;
        }
        foreach ( $data as $row ) {
            $result[$row->date] = $row->number;
        }

        return $result;
    }
}