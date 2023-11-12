<?php require_once './app/Helper/DataBaseHelper.php'; ?>

<?php
class init{
  private $data;

  public function __construct() {

  $this->data = new DataBaseHelper(); 

  }
  
  public function inicializarDatos($host,$username,$password,$databaseName){

    $this->data->crearDbSiNoExiste($host,$username,$password,$databaseName);
    
  }
  

}
?>

