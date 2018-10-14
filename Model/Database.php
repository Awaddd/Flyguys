<?php

require_once "../Model/Destination.php";
require_once "../Model/Schedule.php";
require_once "../Model/Flight.php";
require_once "../Model/User.php";

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Awad135790');
define('DB_NAME', 'flyguys');

// PDO database class
// Connect to database
// Create prepared statements
// Bind values
// Return rows and results

class Database{
  // private $host = "kunet.kingston.ac.uk";
  // private $user = "k1515917";
  // private $pass = "Lockit777";
  // private $dbname = "db_k1515917";

  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;



  private $db;
  private $error;

  public function __construct(){
    // Set DSN
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Create PDO instance
    try {
      $this->db = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }



  // USER

  public function login($username, $password){
    $stmt = $this->db->prepare("SELECT * FROM user WHERE Username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "User");

    $hashed_password = $row[0]->Password;

    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  public function register($username, $password){

    $stmt = $this->db->prepare("INSERT INTO user (Username, Password, UserType) VALUES (:username, :password, :userType)");
    $userType = 2;
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":userType", $userType);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // USER END

  // DESTINATIONS

  public function getAllDestinations(){
    $stmt = $this->db->prepare("SELECT * FROM destinations");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Destination");
    return $row;
  }

  public function getDestinations(){
    $stmt = $this->db->prepare("SELECT * FROM destinations WHERE DestinationName NOT LIKE 'Stanstead'");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Destination");
    return $row;
  }

  public function getLastDestination(){
    return $this->db->lastInsertId();
  }

  public function createDestination($destination){
    $stmt = $this->db->prepare("INSERT INTO destinations (destinationName) VALUES (:destination)");
    $stmt->bindParam(":destination", $destination);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateDestination($newDestinationName, $oldDestination){

    $stmt = $this->db->prepare("UPDATE destinations SET DestinationName = :newDestination WHERE Destination_ID = :oldDestination");
    $stmt->bindParam(":newDestination", $newDestinationName);
    $stmt->bindParam(":oldDestination", $oldDestination);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteDestination($destinationID){
    $stmt = $this->db->prepare("DELETE FROM destinations WHERE Destination_ID = :desID");
    $stmt->bindParam(":desID", $destinationID);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }


  // DESTINATIONS END

  // SCHEDULE

  public function getFlightSchedule(){
    $stmt = $this->db->prepare("SELECT * FROM schedule");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Schedule");
    return $row;
  }

  // INNER JOINS USED TO GET THE DESTINATION NAME
  public function getSchedule(){
    $stmt = $this->db->prepare("SELECT schedule.Schedule_ID, schedule.FromDestination AS FromID, a.destinationName AS FromDestination, schedule.toDestination AS ToID, b.destinationName AS ToDestination, schedule.Duration, destinationType.Description
                                FROM schedule
                                INNER JOIN destinations a
                                ON schedule.FromDestination = a.Destination_ID
                                INNER JOIN destinations b
                                ON schedule.ToDestination = b.Destination_ID
                                INNER JOIN destinationType
                                ON schedule.destination_type = destinationType.Type_id");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Schedule");
    return $row;
  }

  public function createFlightSchedule($destination1, $destination2, $destinationType, $duration){
    $stmt = $this->db->prepare("INSERT INTO schedule(fromDestination, toDestination, Duration, destination_type) VALUES (:destination1, :destination2, :duration, :destinationType)");
    $stmt->bindParam(":destination1", $destination1);
    $stmt->bindParam(":destination2", $destination2);
    $stmt->bindParam(":duration", $duration);
    $stmt->bindParam(":destinationType", $destinationType);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

  }

  public function updateSchedule($destinationID, $duration){

    $stmt = $this->db->prepare("UPDATE schedule SET Duration = :duration WHERE (FromDestination = :destinationID) OR (ToDestination = :destinationID)");
    $stmt->bindParam(":destinationID", $destinationID);
    $stmt->bindParam(":duration", $duration);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // SCHEDULE END

  // FLIGHT

  public function getOutboundFlights(){
    $stmt = $this->db->prepare("SELECT flight.Flight_ID, a.DestinationName AS FromDestination, destinationType.LeaveTime , b.DestinationName AS ToDestination, flight.DepartureDate, schedule.Duration, destinationType.Description FROM schedule INNER JOIN flight ON schedule.Schedule_ID = flight.Schedule_ID INNER JOIN destinations a ON schedule.FromDestination = a.Destination_ID INNER JOIN destinations b ON schedule.ToDestination = b.Destination_ID INNER JOIN destinationType
      ON schedule.destination_type = destinationType.Type_id WHERE schedule.FromDestination = 1");
      //"
      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Flight");
      return $row;
  }

  public function inboundFlights(){
    $stmt = $this->db->prepare("SELECT flight.Flight_ID, a.DestinationName AS FromDestination, b.DestinationName AS ToDestination, flight.DepartureDate, schedule.Duration, destinationType.Description FROM schedule INNER JOIN flight ON schedule.Schedule_ID = flight.Schedule_ID INNER JOIN destinations a ON schedule.FromDestination = a.Destination_ID INNER JOIN destinations b ON schedule.ToDestination = b.Destination_ID INNER JOIN destinationType
      ON schedule.destination_type = destinationType.Type_id WHERE schedule.FromDestination != 1");

      $stmt->execute();
      $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Flight");
      return $row;
  }

  public function searchOutboundFlights($ToDes, $ToDate, $FromDate, $Day){
    $stmt = $this->db->prepare("SELECT flight.Flight_ID, a.DestinationName AS FromDestination, b.DestinationName AS ToDestination, flight.DepartureDate, schedule.Duration, destinationType.Description, destinationType.LeaveTime, DayName(flight.DepartureDate) AS Day
    FROM schedule
    INNER JOIN flight ON schedule.Schedule_ID = flight.Schedule_ID
    INNER JOIN destinations a ON schedule.FromDestination = a.Destination_ID
    INNER JOIN destinations b ON schedule.ToDestination = b.Destination_ID
    INNER JOIN destinationType ON schedule.destination_type = destinationType.Type_id
    WHERE schedule.FromDestination = 1
    AND (DayName(flight.DepartureDate) = :Day OR :Day=1)
    AND (flight.DepartureDate >= :ToDate)
    AND (flight.DepartureDate <= :FromDate)
    AND (schedule.ToDestination = :ToDes OR :ToDes=1)");

    $stmt->bindParam(":ToDes", $ToDes);
    $stmt->bindParam(":ToDate", $ToDate);
    $stmt->bindParam(":FromDate", $FromDate);
    $stmt->bindParam(":Day", $Day);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Flight");
    return $row;
  }

  public function searchinboundFlights($FromDes, $ToDate, $FromDate, $Day){
    $stmt = $this->db->prepare("SELECT flight.Flight_ID, a.DestinationName AS FromDestination, b.DestinationName AS ToDestination, flight.DepartureDate, schedule.Duration, destinationType.Description, destinationType.LeaveTime, DayName(flight.DepartureDate) AS Day
    FROM schedule
    INNER JOIN flight ON schedule.Schedule_ID = flight.Schedule_ID
    INNER JOIN destinations a ON schedule.FromDestination = a.Destination_ID
    INNER JOIN destinations b ON schedule.ToDestination = b.Destination_ID
    INNER JOIN destinationType ON schedule.destination_type = destinationType.Type_id
    WHERE schedule.FromDestination != 1
    AND (DayName(flight.DepartureDate) = :Day OR :Day=1)
    AND (flight.DepartureDate >= :ToDate)
    AND (flight.DepartureDate <= :FromDate)
    AND (schedule.FromDestination = :FromDes OR :FromDes=1)");

    $stmt->bindParam(":FromDes", $FromDes);
    $stmt->bindParam(":ToDate", $ToDate);
    $stmt->bindParam(":FromDate", $FromDate);
    $stmt->bindParam(":Day", $Day);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_CLASS, "Flight");
    return $row;
  }

  public function getSingleFlight($flightID){
        $stmt = $this->db->prepare("SELECT flight.Flight_ID, a.DestinationName AS FromDestination, b.DestinationName AS ToDestination, flight.DepartureDate, schedule.Duration, destinationType.Description, destinationType.LeaveTime, DayName(flight.DepartureDate) AS Day
        FROM schedule
        INNER JOIN flight ON schedule.Schedule_ID = flight.Schedule_ID
        INNER JOIN destinations a ON schedule.FromDestination = a.Destination_ID
        INNER JOIN destinations b ON schedule.ToDestination = b.Destination_ID
        INNER JOIN destinationType ON schedule.destination_type = destinationType.Type_id
        WHERE flight.Flight_ID = :flightID");

        $stmt->bindParam(":flightID", $flightID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Flight");
        $row = $stmt->fetch();
        return $row;
      }

  // FLIGHT END




}

?>
