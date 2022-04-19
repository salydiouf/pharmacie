<?php
include_once('config.php');

$model = new Model();

// $data = ["prenom"=>"Pape", "nom"=>"Diop", "lieu_naiss"=>"Dakar", "date_naiss"=>"2021-07-02"];
// see($data);
// sd($model->insert("client", $data));

class Model {

    private $db;

    public function __construct($host = null, $username = null, $password = null, $database = null){
    
        if($host != null){
          $_host = $host;
          $_username = $username;
          $_password = $password;
          $_database = $database;
        }
        else{  // on les prend de config.php   
          $_host = host;
          $_username = username;
          $_password = password;
          $_database = database;
        }
        try{ 
          $this->db = new PDO('mysql:host='.$_host.';dbname='.$_database.';charset=utf8', $_username, $_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));   
        }catch (Exception $e) {
          die('<h1>Impossible de se connecter à la base de données</h1> : '.$e->getMessage());
        }
    }
    function create($table, $tabAss){
      return $this->insert($table, $tabAss);
    }
    function insert($table, $tabAss){
      $sql = "insert into `$table`(`".implode("`, `", array_keys($tabAss))."`) values(".'"'.implode('", "', $tabAss).'"'.")";

        return $this->db->query($sql);
    }
    
    // $whereAssArray = array("id"=> 1, "name"=>"MBOUP");
    function read($table, $whereAssArray){
    //"SELECT * FROM `client` where id = 1 and name = 'MBOUP'";
  /* $sql = "SELECT * FROM `client` where id = ? and `nom` = ?";
      $data = array(1, "MBOUP"); non nommée*/ 
      if(empty($whereAssArray))
        $where = "1";
      else {
        $where = "";
        foreach ($whereAssArray as $key => $value) {
          $where = "`$key` =:$key and";
        }
        $where = trim($where, "and");
      }

      $sql = "SELECT * FROM `$table` where $where";
      $req = $this->db->prepare($sql);
      $req->execute($whereAssArray);
       return $req->fetchAll();
      // see($data);

    }
    function update($table, $datas, $id){
        $sql = "UPDATE `$table` SET";
        foreach ($datas as $key => $value) 
            $sql .= " `$key`='$value',";
        $sql = trim($sql, ",");
        $sql .= " WHERE `id`=$id";
        return $this->db->query($sql);
    }
    function delete($table, $id){
      $sql = "DELETE FROM `$table` WHERE  `id`='$id'";
      return $this->db->query($sql);
    }

}
?>
