<?php
namespace App;

class Order
{

  private $menu = [
    ["name" => "豬肉漢堡", "price" => 120], 
    ["name" => "牛肉漢堡", "price" => 160], 
    ["name" => "義大利麵", "price" => 130]
  ];
  private $count = [0, 0, 0];
  private $total = 0;
  private $reduce = 0;
  private $is_member = false;

  public function setIsMember()
  {
    $this->is_member = true;
  }

  public function discount()
  {
    $burger_number = $this->count[0] + $this->count[1];
    $reduce_number = floor($burger_number / 2);

    if ($reduce_number < $this->count[0]) {
      $this->reduce = $reduce_number * $this->menu[0]["price"] / 2;
    } else {
      $this->reduce = $this->count[0] * $this->menu[0]["price"] / 2 + ($reduce_number - $this->count[0]) * $this->menu[1]["price"] / 2;
    }

  }

  public function add($value)
  {
    
    $this->count[$value]++;

    $this->total = $this->menu[0]["price"] * $this->count[0] + $this->menu[1]["price"] * $this->count[1] + $this->menu[2]["price"] * $this->count[2];
  
  }

  public function getPrice()
  {
  
    if ($this->is_member == true) {
      return floor(0.9 * ($this->total - $this->reduce));
    } else {
      return $this->total - $this->reduce;
    }

  }
  
}

