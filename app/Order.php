<?php
namespace App;

class Order
{

  private $menu = [
    ["name" => "豬肉漢堡", "price" => 100], 
    ["name" => "牛肉漢堡", "price" => 160], 
    ["name" => "義大利麵", "price" => 130]
  ];
  private $count = [0, 0, 0];
  private $total = 0;


  public function add($value)
  {
    $this->count[$value]++;
    $this->total = $this->menu[0]["price"] * $this->count[0] + $this->menu[1]["price"] * $this->count[1] + $this->menu[2]["price"] * $this->count[2];
  }

  public function getPrice()
  {
    
    return $this->total;

  }
  
}

