<?php
namespace Test;

use App\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

  protected function setUp():void
  {
    parent::setUp();
    $this->order = new Order();
  }

  protected function tearDown():void
  {
    parent::tearDown();
    $this->order = null;
  }

  public function test_give0_return100()
  {
    $this->order->add(0);
    $price = $this->order->getPrice();

    $expected = 100;

    $this->assertEquals($expected, $price);
  }

  public function test_give1_return160()
  {
    $this->order->add(1);
    $price = $this->order->getPrice();

    $expected = 160;

    $this->assertEquals($expected, $price);
  }

  public function test_give2_return130()
  {
    $this->order->add(2);
    $price = $this->order->getPrice();

    $expected = 130;

    $this->assertEquals($expected, $price);
  }

  public function test_give1and2_return290()
  {
    $this->order->add(1);
    $this->order->add(2);
    $price = $this->order->getPrice();

    $expected = 290;

    $this->assertEquals($expected, $price);
  }
  

}
