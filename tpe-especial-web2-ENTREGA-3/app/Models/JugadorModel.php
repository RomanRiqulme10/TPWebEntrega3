<?php
require_once './app/Models/Model.php' ;
class JugadorModel extends Model {

            public function getJugadores(){

                $query = $this->db->prepare('SELECT * FROM jugadores');
                $query->execute();

                $jugadores = $query->fetchAll(PDO::FETCH_OBJ);

                return $jugadores;

            }

            public function getJugadorbyID($id) {

                $query = $this->db->prepare('SELECT * FROM jugadores WHERE id_jugador = ?');
                $query->execute([$id]);

                $jugador = $query->fetch(PDO::FETCH_OBJ);

                return $jugador;
            }

            public function EliminarJugador($id){
                $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ? '); 
                $query->execute([$id]) ;
            }

            public function addJugador($nombreApellido,$edad,$goles,$id_club){
                try{
                    $query = $this->db->prepare('INSERT INTO `jugadores` (`Nombre_Apellido`, `edad`, `goles`, `club_id`) VALUES ( ? , ? , ? , ?)');
                    $query->execute([$nombreApellido,$edad,$goles, $id_club]);
                    return true ;
                }catch(PDOException $e){
                    return null;
                    
                }
                
            }

            function updateJugador($id_jugador, $NombreApellido, $edad, $goles, $id_club){

                try{    
              
                  $query = $this->db->prepare('UPDATE jugadores SET Nombre_Apellido = ?, edad = ? , goles = ?, club_id = ? WHERE id_jugador = ?');
                  $query->execute([$NombreApellido, $edad, $goles, $id_club,$id_jugador]);
                  return true;
                  }
                catch(PDOException $e){
                  return null;
              }
            }

         

            function ListaJugadores($adicional) {
                $query = $this->db->prepare("SELECT Nombre_Apellido, club_id, edad, goles FROM jugadores $adicional;");
                $query->execute();
                $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
                return $jugadores;//para que se pueda incluir 
            }
    }
        
?>
