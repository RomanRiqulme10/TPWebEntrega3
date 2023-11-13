<?php 
require_once './app/Models/JugadorModel.php';
require_once './app/Visual/ApiView.php';
require_once './app/controllers/apiController.php';

class JugadorController extends ApiController{

    protected $model;
    private $viewAPI;

    public function __construct() {

        parent::__construct();
     
        $this->model = new JugadorModel();
        $this->viewAPI = new ApiView();
        
       

    }

    public function getJugadores(){

      if (empty($params)) {
        if (isset($_GET['sort']) && isset($_GET['order'])) {
            $sort = $_GET['sort'];
            $order = $_GET['order'];
            switch ($sort) {
                case 'edad':
                    $sort = 'edad';
                    break;
                case 'goles':
                    $sort = 'goles';
                    break;
                case 'club_id':
                    $sort = 'club_id';
                    break;
                default:
                    $this->view->response('Registro ' . $sort . ' incorrecto', 404);
                    break;
            }
            if ($order !== 'desc') {
                $order = 'asc';
            } 
            $adicional = 'ORDER BY ' . $sort . ' ' . $order;
        } else {
            $adicional = '';
        }


      
        $lista= $this->model->ListaJugadores($adicional);
        $this->view->response($lista, 200);
       
      ///////////////////////////////////////////////////////////////
      }
       

    }

    public function getJugadoresByID($params = []){
        
        $jugador = $this->model->getJugadorbyID($params[':ID']);

        if(empty($jugador)){
            $this->viewAPI->response( ['response' => 'Bad Request'],400);
        }else {
            $this->viewAPI->response($jugador, 200) ;
        }

    }

    function deleteJugadorByID($params = []) {

        $jugador = $this->model->getJugador($params[':ID']);
        
        if ($jugador){

          $this->model->EliminarJugador($params[':ID']);
          $this->viewAPI->response(['response' => 'Jugador eliminado'],200);

        }else{

          $this->viewAPI->response(['response' => 'Not Found'],404);

        }
        
      }

      function addJugador(){

        $body = $this->getData();
        $body = $this->getData();
            $NombreApellido = $body->NombreApellido;
            $edad = $body->edad;
            $goles = $body->goles;
            $id_club = $body->id_club;
        
        
        
        $boolean = $this->model->addJugador($NombreApellido,$edad,$goles,$id_club);
        
        if ($boolean) {
          $this->view->response(['response' => 'Jugador aniadido'],201);
        }else{
          $this->view->response(['response' => 'Ocurrio un problema para aniadir el jugador'],404);
        }
      }

      function updateJugador($params = []){
    
        $id_jugador = $params[':ID'];
        $jugador = $this->model->getJugador($id_jugador);
       
        if (!$jugador) {
          $this->view->response(['response' => 'El jugador no existe'],400);
        }else {
            $body = $this->getData();
            $NombreApellido = $body->NombreApellido;
            $edad = $body->edad;
            $goles = $body->goles;
            $id_club = $body->id_club;
                  
          $boolean = $this->model->updateJugador($id_jugador,$NombreApellido,$edad,$goles,$id_club);

          if ($boolean) {
            $this->view->response(['response' => 'Jugador editado correctamente'],200);
          }else{
            $this->view->response(['response' => 'Ocurrio un problema al editar el jugador'],404);
          }
          }
        }
      }



?>








