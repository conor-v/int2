<?php

require_once( __DIR__ . '/DAO.php');

class TicketDAO extends DAO {

  //set 1
  public function selectAllTicketsset1(){
    $sql = "SELECT * FROM `int2_tickets` 
    JOIN `int2_types` ON `int2_tickets`.`type_id` = `int2_types`.`id`
    WHERE `int2_types`.`type` = 'enkel' OR `int2_types`.`type` = 'groep' ORDER BY `int2_tickets`.`id` LIMIT 15";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //set2
  public function selectAllTicketsset2(){
    $sql = "SELECT * FROM `int2_tickets`
    JOIN `int2_types` ON `int2_tickets`.`type_id` = `int2_types`.`id`
    WHERE `int2_tickets`.`id` > 15 AND (`int2_types`.`type` = 'enkel' OR `int2_types`.`type` = 'groep') ORDER BY `int2_tickets`.`id` LIMIT 15";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  //totaal spelers enkel en groep
  public function selectTicketTotaal(){
    $sql = "SELECT COUNT(*) AS `totaal` FROM `int2_tickets` 
    JOIN `int2_types` ON `int2_tickets`.`type_id` = `int2_types`.`id`
    WHERE `int2_types`.`type` = 'enkel' OR `int2_types`.`type` = 'groep'";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  //select op id
  public function selectById($id){
    $sql = "SELECT * FROM `int2_tickets` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  /**************
       INSERT
  **************/
  public function insert($data){
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `int2_tickets` (`name`, `email`, `street`, `zipcode`, `town`, `score`, `img_pad`, `type_id`) 
      VALUES (:name, :email, :street, :zipcode, :town, :score, :img_pad, :type_id)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $data['name']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':street', $data['street']);
      $stmt->bindValue(':zipcode', $data['zipcode']);
      $stmt->bindValue(':town', $data['town']);
      $stmt->bindValue(':score', $data['score']);
      $stmt->bindValue(':img_pad', $data['img_pad']);
      $stmt->bindValue(':type_id', $data['type_id']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  //backend validatie
  public function validate( $data ){
    $errors = [];
    if (empty($data['name'])) {
      $errors['name'] = 'Gelieve naam in te vullen';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'Gelieve email in te vullen';
    }
    if (empty($data['street'])) {
      $errors['street'] = 'Gelieve straat in te vullen';
    }
    if (empty($data['zipcode'])) {
      $errors['zipcode'] = 'Gelieve postcode in te vullen';
    }
    if (empty($data['town'])) {
      $errors['town'] = 'Gelieve gemeente in te vullen';
    }
    return $errors;
  }
}