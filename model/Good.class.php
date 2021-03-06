<?php

class Good extends Model {
  protected static $table = 'goods';

  protected static function setProperties() {
    self::$properties['id_good'] = [
        'type' => 'int'
    ];

    self::$properties['name'] = [
        'type' => 'varchar',
        'size' => 512
    ];

    self::$properties['price'] = [
        'type' => 'float'
    ];

    self::$properties['description'] = [
        'type' => 'text'
    ];

    self::$properties['image'] = [
      'type' => 'text'
    ];

    self::$properties['category'] = [
        'type' => 'int'
    ];
  }

  public static function getGoods() {

    return db::getInstance()->Query(
          'SELECT * FROM catalog ORDER BY id DESC',
          ['status' => Status::Active]
    );
  }

  public function getGoodInfo() {
    return db::getInstance()->Select(
        'SELECT * FROM catalog WHERE id = :id_good',
        ['id_good' => (int)$this->id_good]);
  }

  public static function getGoodPrice($id_good) {
    $result = db::getInstance()->Select(
        'SELECT price FROM catalog WHERE id = :id_good',
        ['id_good' => $id_good]);

    return (isset($result[0]) ? $result[0]['price'] : null);
  }

  public static function getGoodName($id_good) {
    $result = db::getInstance()->Select(
      "SELECT name FROM catalog WHERE id = :id_good",
      ['id_good' => $id_good]);

    return (isset($result[0]) ? $result[0]['name'] : null);
  }

  public static function getGoodImage($id_good) {
    $result = db::getInstance()->Select(
      'SELECT image FROM catalog WHERE id = :id_good',
      ['id_good' => $id_good]);

    return (isset($result[0]) ? $result[0]['image'] : null);
  }
}