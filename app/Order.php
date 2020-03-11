<?php
namespace App;

class Order
{

  private $count = [0, 0, 0];

  public function add($value)
  {
    $this->count[$value]++;
  }

  public function getPrice()
  {
    if ($this->count[0] == 1) {
      return 100;
    }
  }
  
}

