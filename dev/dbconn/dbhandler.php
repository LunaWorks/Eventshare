<?php
class DbHandler{
  private $hostname;
  private $username;
  private $passowrd;
  private $name;
  protected $_db_connect;
  protected $_sql;


  /**
   * Database construcor.
   *
   * @param hostname
   * @param username
   * @param password
   */
  function __construct($hostname, $username, $passowrd){

        $this->hostname = $hostname;
        $this->username = $username;
        $this->passowrd = $passowrd;


  }
  function connect(){
  //  $this->_db_connect = mysqli_connect($this->hostname, $this->username, $this->passowrd) or die(mysql_error());
  $this->_db_connect = new mysqli($this->hostname, $this->username, $this->passowrd);
  }

  function select_db($name){
    $this->name = $name;
  $this->_db_connect->select_db($this->name) or die(mysql_error());

  }
  /**
  *Select all.
  */
  function selectAll($tableName){
      return $this->query('SELECT * FROM ' .$tableName);
  }
  /**
  *Run query.
  */
  function query($queryString){
  $queryResult = $this->_db_connect->query($queryString);
    return $queryResult;
  }

  function db_close(){
      mysql_close($this->_db_connect);
  }

}
?>
