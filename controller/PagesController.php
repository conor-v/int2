<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/EventDAO.php';
require_once __DIR__ . '/../dao/TicketDAO.php';

class PagesController extends Controller {

  function __construct() {
    $this->EventDAO = new EventDAO();
    $this->TicketDAO = new TicketDAO();
  }

  /******************
         INDEX
   *****************/
  public function index() {
    
    $this->set('title', 'home');
    $this->set('currentPage', 'home');
  }

  /******************
         EVENTS
   *****************/
  public function events() {
    $events = $this->EventDAO->selectAllEvents();
    if (!empty($_GET['action'])){
      if ($_GET['action'] == 'filterEvents') {
        if (($_GET['season'] == 'alles') ||  ($_GET['categorie'] == 'alles' )) {
          $events = $this->EventDAO->selectAllEvents();
        }
        else 
        {
          if (!empty($_GET['season']) && empty($_GET['categorie'])) {
            $events = $this->EventDAO->selectAllEventsWithSeason($_GET['season']);
          }
          if (empty($_GET['season']) && !empty($_GET['categorie'])) {
            $events = $this->EventDAO->selectAllEventsWithCategorie($_GET['categorie']);
          }
          if (!empty($_GET['season']) && !empty($_GET['categorie'])) {
            $events = $this->EventDAO->selectAllEventsWithCategorieAndSeason($_GET['categorie'], $_GET['season']);
          }
        }

        if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
          echo json_encode($events);
          exit();
        }

        if (empty($events)) {
          $_SESSION['error'] = 'Er zijn geen events gevonden!';
        }
      }
    }

    $this->set('events', $events);
    $this->set('categories', $categories = $this->EventDAO->selectAllCategories());
    $this->set('seasons', $seasons = $this->EventDAO->selectAllSeasons());
    $this->set('title', 'events');
    $this->set('currentPage', 'events');
  }

  /******************
         DETAILS
   *****************/
  public function details() {
    
    //checkt of er een id is
    if (!empty($_GET['id'])) {
      $event = $this->EventDAO->selectById($_GET['id']);
    }
    //geen geldig id dan reroute naar home
    if (empty($event)){
      $_SESSION['error'] = 'Dit event is niet gevonden!';
      header('location: index.php?page=events');
      exit();
    }

    $this->set('event', $event);
    $this->set('title', 'event details');
    $this->set('currentPage', 'details');
  }

  /******************
         SCOREBORD
   *****************/
  public function scorebord() {

    $totaal = $this->TicketDAO->selectTicketTotaal();

    if (empty($_GET['set'])) {
      $scores = $this->TicketDAO->selectAllTicketsset1();
    }
    if (!empty($_GET['set'])){
      if($_GET['set'] == 1){
        $scores = $this->TicketDAO->selectAllTicketsset1();
      }else {
        $scores = $this->TicketDAO->selectAllTicketsset2(); 
      }
    }
    
    $this->set('scores', $scores);
    $this->set('totaal', $totaal);
    $this->set('title', 'scorebord');
    $this->set('currentPage', 'scorebord');
  }

  /******************
         TICKETS
   *****************/
  public function tickets() {
 
    if (!empty($_POST['action'])) {
      if (empty($_FILES)) {
        $target = "/";
      } else {
        $target = "assets/groep_logos/".basename($_FILES['image']['name']);
      }
      
      //check file gegeven met juist pars
      if (!empty($_FILES)){
        $image_info = getimagesize($_FILES["image"]["tmp_name"]);
        $image_width = $image_info[0];
        $image_height = $image_info[1];

        //size check
        if ($image_height > 60 || $image_width > 80) {
          $image_height = 60;
          $image_width = 80;
        }
        //type check
        if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg'){
          $fileError = "Deze file is geen png, jpg of jpeg probeer het opnieuw";
        }
        //filesize check
        if ($_FILES['image']['size'] > 2000000) {
          $fileError = "Deze file is meer dan 2MB. Sorry, het moet minder of gelijk zijn aan 2MB";
        }
        //geen errors uploaden
        if (empty($fileError)){
          move_uploaded_file($_FILES['image']['tmp_name'],$target);
        }
      }
      
      //check of de action van het form
      if ($_POST['action'] == 'insertTicket' && empty($fileError)) {
        $data = array(
          'name' => $_POST['naam'],
          'email' => $_POST['email'],
          'street' => $_POST['straat'],
          'zipcode' => $_POST['postcode'],
          'town' => $_POST['gemeente'],
          'score' => '00 : 00 : 00',
          'img_pad' => $target,
          'type_id' => $_GET['type']
        );
        //fout gevonden
        if (!empty($errors) || !empty($fileError)){
          //????
        }else{
          $insertTicket = $this->TicketDAO->insert($data);
        }
        //als het form leeg is geef errors mee
        if (empty($insertTicket)) {
          $errors = $this->TicketDAO->validate($data);
        }

        if (!empty($insertTicket)){
          $_SESSION['info'] = 'U ticket is besteld!';
          header("Location: index.php");
          exit();
        }
        
      }
    }
    
    //alleen errors geven als er zijn
    if (!empty($errors)){
      $this->set('errors', $errors);
    }
    if (!empty($fileError)){
      $this->set('fileError', $fileError);
    }

    $this->set('title', 'tickets');
    $this->set('currentPage', 'tickets');
  }
}
