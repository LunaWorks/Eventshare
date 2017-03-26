<?php
/**
 * Database handling is exported to this class.
 */
class MyDB
{
  static $servername = 'localhost';
  static $username = 'eventshare';
  static $password = '';
  static $dbname = 'sharebase';

  public static function getConnection() {
    return new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
  }
}
?>
