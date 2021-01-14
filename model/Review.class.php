<?php

class Review extends Model {

  protected static function setProperties() {
    self::$properties['id_user'] = [
      'type' => 'int'
    ];

    self::$properties['name'] = [
      'type' => 'varchar',
      'size' => 512
    ];

    self::$properties['text'] = [
      'type' => 'text'
    ];
  }

  public static function getReviews() {
    return db::getInstance()->Query(
      'SELECT * FROM comment ORDER BY id DESC ',
    ['status'=>Status::Active]);
  }
}