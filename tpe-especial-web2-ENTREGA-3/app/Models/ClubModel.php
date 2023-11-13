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

            public function addclub($club,$id_club){
                try{
                    $query = $this->db->prepare('INSERT INTO `clubes` (`club`,`club_id`) VALUES ( ? , ? )');
                    $query->execute([$club,$id_club]);
                    return true ;
                }catch(PDOException $e){
                    return null;
                    
                }
                
            }

            function updateClub($club, $club_id){
                try{    
                  $query = $this->db->prepare('UPDATE clubes SET club = ? WHERE club_id = ?');
                  $query->execute([$club,$club_id]);
                  return true;
                  }
                catch(PDOException $e){
                  return null;
              }
            }
           
        }
?>
       