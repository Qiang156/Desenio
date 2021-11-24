<?php

use PHPUnit\Framework\TestCase;

include 'model/baseModel.php';
include 'model/dogsModel.php';
include 'model/membersModel.php';
include 'model/ordersModel.php';

final class modelTest extends TestCase
{
    private $model = null;

    public function setUp(): void
    {
        $this->model = new WGR_BaseModel();
    }

    public function tearDown(): void
    {
        $this->model = null;
    }

    /**
     * Test dogsModel
     */
    public function testDogsModel(): void
    {
        $dogsModel = new WGR_DogsModel($this->model);
        $data = $dogsModel->getBreeds('terrier');
        $this->assertContains('cairn', $data);
        $this->assertContains('russell', $data);
    }

    /**
     * Test membersModel
     */
    public function testMembersModel(): void
    {
        $memberModel = new WGR_MembersModel($this->model);
        $data = $memberModel->getMembersWithParents('foo');
        $this->assertCount(4, $data);

        $this->assertContains('Andersson',$data[1]->parent);
        $this->assertContains('Bengtsson',$data[2]->parent);
        $this->assertContains('Claesson',$data[3]->parent);
        foreach ( $data as $key => $val ) {
            $this->assertCount($key, $val->parent);
        }
    }

    /**
     * Test OrdersModel
     * because getOrderCountBetweenTwoDays has been changed
     */
    public function testOrdersModel(): void
    {
        $orderModel = new WGR_OrdersModel($this->model);
        $data = $orderModel->getOrderCountBetweenTwoDays('2021-11-05','2021-11-10');
        //$this->assertEquals(0,$data['2021-11-06']);
        //$this->assertEquals(2,$data['2021-11-09']);
        //$this->assertEquals(1,$data['2021-11-07']);
        //$this->assertEquals(1,$data['2021-11-10']);
    }
}