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

  /**
   * @test
   */
  public function getPrice_Add0_Return100()
  {
    //Arrange
    $this->order->add(0);
    
    $expected = 100;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function getPrice_Add1_Return160()
  {
    //Arrange
    $this->order->add(1);
    
    $expected = 160;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }
  
}
