<?php
require_once './app/Models/Model.php' ;
class AdminModel extends Model {
  
    public function getJugador($id){
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id_jugador = ?');
        $query->execute([$id]);
        $jugador  = $query->fetch(PDO::FETCH_OBJ); 
        return $jugador;
    }
    public function getClub($clubName){
        $query = $this->db->prepare('SELECT * FROM clubes WHERE Club = ?');
        $query->execute([$clubName]);
        $club  = $query->fetch(PDO::FETCH_OBJ); 
        return $club;
    }
    public function getClubes() {    
        $query = $this->db->prepare('SELECT * FROM clubes');
        $query->execute();
        $clubes  = $query->fetchAll(PDO::FETCH_OBJ); 
        return $clubes;
    }

    public function eliminarJugador($id){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id_jugador = ?') ;
        $query->execute([$id]) ;
    }

    public function eliminarJugadores($id_club){
        $query = $this->db->prepare('DELETE FROM jugadores WHERE club_id = ?') ;
        $query->execute([$id_club]) ;
    }

    public function agregarClub($club){
        $query = $this->db->prepare('INSERT INTO clubes (Club) values(?)') ;
        $query->execute([$club]) ;
    }

    public function getJugadores(){
        $query = $this->db->prepare('SELECT * FROM  jugadores');
        $query->execute();
        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $jugadores;
    }

    public function eliminarClub($id){
        $this->eliminarJugadores($id);
        $query = $this->db->prepare('DELETE FROM clubes where club_id = ?');
        $query->execute([$id]);
    }

    public function editarClub($club, $id) {
        $query = $this->db->prepare('UPDATE clubes SET Club = ? WHERE club_id = ?');
        $query->execute([$club, $id]);
    }

    public function editarJugador($jugador_name,$edad,$goles,$club,$id,$jugador){
        $query = $this->db->prepare('UPDATE jugadores SET Nombre_Apellido = ?, edad = ?, goles = ?, club_id = ? WHERE club_id = ? AND id_jugador = ? ');
        $query->execute([$jugador_name,$edad,$goles,$club->club_id, $id,$jugador]);
    }

    public function clubInvalido($clubName){
        $query = $this->db->prepare('SELECT * FROM clubes WHERE club = ?');
        $query->execute([$clubName]);
        $club = $query->fetch(PDO::FETCH_OBJ) ;
        return $club ;
    }

    public function agregarJugador($edad,$goles,$jugadorName,$club_id){

        $query = $this->db->prepare('INSERT INTO jugadores (Nombre_Apellido, edad, goles, club_id) VALUES (?, ? ,? ,?)');
        $query->execute([$jugadorName,$edad,$goles,$club_id]);
        
        
    }
    
}

