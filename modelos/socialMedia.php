<?php
class SocialMedia extends Conectar {
    public function get_socialMedia() {
        $social = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM social_media";
        $sql = $social->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function insert_socialMedia($socmed_icono, $socmed_url) {
        $social = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO social_media(socmed_icono, socmed_url, est) VALUES (?, ?, 1)";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_icono);
        $sql->bindValue(2, $socmed_url);
        $sql->execute();
    }

    public function update_socialMedia($socmed_id, $socmed_icono, $socmed_url) {
        $social = parent::conexion();
        parent::set_names();
        $sql = "UPDATE social_media SET socmed_icono=?, socmed_url=? WHERE socmed_id=?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_icono);
        $sql->bindValue(2, $socmed_url);
        $sql->bindValue(3, $socmed_id);
        $sql->execute();
    }

    public function delete_socialMedia($socmed_id) {
        $social = parent::conexion();
        parent::set_names();
        $sql = "UPDATE social_media SET est=0 WHERE socmed_id=?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_id);
        $sql->execute();
    }
    
    public function get_socialMediaXid($socmed_id) {
        $social = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM social_media WHERE socmed_id=?";
        $sql = $social->prepare($sql);
        $sql->bindValue(1, $socmed_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}
?>