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
  public function getPrice_Add0_Return120()
  {
    //Arrange
    $this->order->add(0);
    
    $expected = 120;
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
  
  /**
   * @test
   */
  public function getPrice_Add2of0_Return180()
  {
    //Arrange
    $this->order->add(0);
    $this->order->add(0);
    $this->order->discount();
    $expected = 180;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }
  
  /**
   * @test
   */
  public function getPrice_Add1of0and1of1_Return220()
  {
    //Arrange
    $this->order->add(0);
    $this->order->add(1);
    $this->order->discount();
    $expected = 220;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }
  
}
