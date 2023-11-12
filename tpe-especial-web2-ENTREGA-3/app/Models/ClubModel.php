<?php
require_once './app/Models/Model.php' ;
class ClubModel extends Model {
   
        
            public function getClub($id){
                
                $query = $this->db->prepare('SELECT * FROM  clubes WHERE club_id = ?');
                $query->execute([$id]);
                $club = $query->fetch(PDO::FETCH_OBJ);
            
                return $club ;
                
            }
        
            public function getClubes() {
                
                $query = $this->db->prepare('SELECT * FROM clubes');
                $query->execute();
                $clubes  = $query->fetchAll(PDO::FETCH_OBJ); 
                
                return $clubes;
                
            }
           
        }
?>
       