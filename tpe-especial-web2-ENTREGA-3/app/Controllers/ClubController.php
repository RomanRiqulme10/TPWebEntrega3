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

    public function showMenu() {

        $clubes = $this->model->getClubes();
        $this->viewAPI->response($clubes,200);
        

    }

    public function getClubes() {

        $clubes = $this->model->getClubes();
        $this->viewAPI->response($clubes,200);
        

    }

    public function deleteClub($params = []){
        $club  =$this->model->getClub($params[':ID']);

    }
        
}
?>