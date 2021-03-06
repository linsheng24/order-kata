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
  
  /**
   * @test
   */
  public function getPrice_Add1of0and1of1AndisMember_Return198()
  {
    //Arrange
    $this->order->add(0);
    $this->order->add(1);
    $this->order->discount();
    $this->order->setIsMember();
    $expected = 198;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }

  /**
   * @test
   */
  public function getPrice_Add2of0and3of1and4of2AndisMember_Return1008()
  {
    //Arrange
    for($i=0;$i<2;$i++) {
      $this->order->add(0);
    }
    for($i=0;$i<3;$i++) {
      $this->order->add(1);
    }
    for($i=0;$i<4;$i++) {
      $this->order->add(2);
    }

    $this->order->discount();
    $this->order->setIsMember();
    $expected = 1008;
    //Act
    $actual = $this->order->getPrice();
    
    //Assert
    $this->assertEquals($expected, $actual);
  }
  
}
