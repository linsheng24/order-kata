<?php
namespace App;

class Order
{
  private $menu = [["name" => "豬肉漢堡", "price" => 100], ["name" => "牛肉漢堡", "price" => 160], ["name" => "義大利麵", "price" => 130]];

  private $total;
  private $count;


  function _construct()
  {
    $this->total = 0;
    $this->count = [0, 0, 0];
  }


  public function add($value)
  {
    $this->total += $this->menu[$value]["price"];
    $this->count[$value]++;
  }

  public function getPrice()
  {
    return $this->total;
  }
}

