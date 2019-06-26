<?php

require_once( __DIR__ . '/DAO.php');

class EventDAO extends DAO {

  //pakt alles uit de DB van events en gelinkt met S & C
  public function selectAllEvents(){
    $sql = "SELECT `int2_events`.*, `int2_seasons`.`season`, `int2_categories`.`categorie`  
    FROM `int2_events` 
    JOIN `int2_seasons` ON `int2_events`.`season_id` = `int2_seasons`.`id`
    JOIN `int2_categories` ON `int2_events`.`categorie_id` = `int2_categories`.`id` ORDER BY `int2_events`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //pakt 1 colum uit de DB op event_id en gelinkt met S & C
  public function selectById($id){
    $sql = "SELECT `int2_events`.*, `int2_seasons`.`season`, `int2_categories`.`categorie`  
    FROM `int2_events` 
    JOIN `int2_seasons` ON `int2_events`.`season_id` = `int2_seasons`.`id`
    JOIN `int2_categories` ON `int2_events`.`categorie_id` = `int2_categories`.`id`
    WHERE `int2_events`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  //pakt alles seasons uit de DB
  public function selectAllSeasons(){
    $sql = "SELECT `season` FROM `int2_seasons`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //pakt alles categories uit de DB
  public function selectAllCategories(){
    $sql = "SELECT `categorie` FROM `int2_categories`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  /********************
      FILTER QUERYS
  ********************/

  public function selectAllEventsWithSeason($season){
    $sql = "SELECT * FROM `int2_events`
    INNER JOIN `int2_categories` ON `int2_categories`.`id` = `int2_events`.`categorie_id`
    INNER JOIN `int2_seasons` ON `int2_seasons`.`id` = `int2_events`.`season_id`
    WHERE `int2_seasons`.`season` = :season";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':season',$season);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllEventsWithCategorie($categorie){
    $sql = "SELECT * FROM `int2_events`
    INNER JOIN `int2_categories` ON `int2_categories`.`id` = `int2_events`.`categorie_id`
    INNER JOIN `int2_seasons` ON `int2_seasons`.`id` = `int2_events`.`season_id`
    WHERE `int2_categories`.`categorie` = :categorie";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':categorie',$categorie);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllEventsWithCategorieAndSeason($categorie, $season){
    $sql = "SELECT `int2_events`.`*`, `int2_seasons`.`season`, `int2_categories`.`categorie` FROM `int2_events`
    INNER JOIN `int2_categories` ON `int2_categories`.`id` = `int2_events`.`categorie_id`
    INNER JOIN `int2_seasons` ON `int2_seasons`.`id` = `int2_events`.`season_id`
    WHERE `int2_categories`.`categorie` = :categorie AND `int2_seasons`.`season` = :season";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':categorie',$categorie);
    $stmt->bindValue(':season',$season);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}