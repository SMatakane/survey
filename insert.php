<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
  <?php
    $host = "localhost";
    $user = "default";
    $pass = "password";
    $dbname = "surveyDb";

    $db = new mysqli($host,$user,$pass,$dbname,null);
    if($db->connect_errno) {
      echo $db->connect_error;
    }
    else {
      echo "connected to db successfully<br>";
    }

    function test_input($data,$form) {
      if (empty($data)) {
        echo "Error:$form is required<br>";
      }
      else {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
      }
    }
    $surname = test_input($_POST["surname"],"Surname");
    $firstname = test_input($_POST["firstname"],"First name");
    $contacts = test_input($_POST["contacts"],"Contacts");
    $date = test_input($_POST["date"],"Date");
    $age = test_input($_POST["age"],"Age");

    $date_arr = explode("-", $date);
    $date = implode("",$date_arr);

    $favs = array($_POST["Pizza"],$_POST["Pasta"],$_POST["Pap"],$_POST["Chicken"],$_POST["Beef"],$_POST["Other"]);
    $favorites = array();
    foreach($favs as $key=>$value) {
      if(!is_null($value)) {
        array_push($favorites,$value);
      }
    }

    $eat = intval($_POST["eat"]);
    $movies = intval($_POST["movies"]);
    $tv = intval($_POST["tv"]);
    $radio = intval($_POST["radio"]);

    $query = "SELECT CASE WHEN EXISTS( SELECT * FROM Personal WHERE surname='$surname' AND firstname='$firstname' AND age='$age') THEN 1 ELSE 0 END";
    if (!$db->query($query)) {
      die("ERROR:$db->error<br>");
    }
    else
    {
      $query = $db->query($query);
      $query = intval($query->fetch_array()[0]);
      if($query == 1)
      {
        die("Valid:user exists<br>");
      }
    }

    $id = 0;
    $query = "INSERT INTO Personal (surname,firstname,contacts,survey_date,age) VALUES ('$surname','$firstname','$contacts','$date','$age')";
    if(!$db->query($query)) {
      die("Error:$db->error<br>");
    }
    else {
      echo "Successfully queried to table Personal<br>";

      $query = "SELECT id FROM Personal WHERE surname='$surname' AND firstname='$firstname' AND age='$age'";
      if(!$db->query($query)){
        die("Error:$db->error<br>");
      }
      else {
        $id = intval($db->query($query)->fetch_array()[0]);
      }
    }

    foreach($favorites as $key=>$value) {
      $query = "INSERT INTO Favorites (fav_id,favorites) VALUES ('$id','$value')";
      if(!$db->query($query)) {
        die("Error:$db->error<br>");
      }
    }
    echo "Successfully queried to table Favorites<br>";

    $query = "INSERT INTO Likes (likes_id,eat,movies,tv,radio) VALUES ('$id','$eat','$movies','$tv','$radio')";
    if(!$db->query($query)) {
      die("Error quering<br>");
    }
    else {
      echo "Successfully queried to table likes<br>";
    }
    header("Location: index.html");
  ?>
  </body>
</html>
