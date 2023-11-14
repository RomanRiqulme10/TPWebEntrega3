<?php 
require_once './app/Models/ClubModel.php';
require_once './app/Visual/ApiView.php';
require_once './app/controllers/apiController.php';

class ClubController extends ApiController{

    protected $model;
    protected $view;
    private $viewAPI;

    public function __construct() {

        parent::__construct();

        $this->model = new ClubModel();
        $this->viewAPI = new ApiView();
       

    }

    public function getClubes() {

        $clubes = $this->model->getClubes();
        $this->viewAPI->response($clubes,200);

    }

    public function getClubByID($params = []){
        
      $club = $this->model->getCLubByID($params[':ID']);

      if(empty($club)){
          $this->viewAPI->response( ['response' => 'El club no existe'],400);
      }else {
          $this->viewAPI->response($club, 200) ;
      }

    }

    function addCLub(){

        $body = $this->getData();
        $body = $this->getData();
            $club = $body->club;
            $id_club = $body->id_club;
        
        
        
        $boolean = $this->model->addCLub($club,$id_club);
        
        if ($boolean) {
          $this->view->response(['response' => 'CLub aniadido'],201);
        }else{
          $this->view->response(['response' => 'Ocurrio un problema para aniadir el club'],404);
        }
      }

      function updateClub($params = []){
    
        $club_id = $params[':ID'];
        $club = $this->model->getClub($club_id);
        
        if (!$club) {
          $this->view->response(['response' => 'El Club No existe'],400);
        }else {
          $body = $this->getData();
            $club = $body->club;
            $boolean = $this->model->updateClub($club,$club_id);
            if ($boolean) {
              $this->view->response(['response' => 'club editado correctamente'],200);
            }else{
              $this->view->response(['response' => 'Ocurrio un problema al editar el club'],404);
            }
      
        }
         
        
      }
        
}
?>
