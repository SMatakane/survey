<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Screen3</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style3.css"/>
  </head>
<body>
<div class="container">
    <?php
      $dbhost = "localhost";
      $username = "default";
      $password = "password";
      $base = "surveyDb";

      $db = new mysqli($dbhost,$username,$password,$base,null);
      if ($db->connect_errno) {
        echo $db->connect_error;
      }

      $query = "SELECT COUNT(*) FROM Personal";
      $total = $db->query($query);
      $total = $total->fetch_array()[0];

      $query = "SELECT AVG(age) FROM Personal";
      $avg_age = $db->query($query);
      $avg_age = round($avg_age->fetch_array()[0]);

      $query = "SELECT MAX(age) FROM Personal";
      $oldest = $db->query($query);
      $oldest = $oldest->fetch_array()[0];

      $query = "SELECT MIN(AGE) FROM Personal";
      $youngest = $db->query($query);
      $youngest = $youngest->fetch_array()[0];

      $query = "SELECT count(*) FROM Favorites WHERE favorites='Pizza'";
      $percentage_pizza = $db->query($query);
      $percentage_pizza = (($percentage_pizza->fetch_array()[0])/($total))*100;
      $percentage_pizza = number_format($percentage_pizza,1);

      $query = "SELECT count(*) FROM Favorites WHERE favorites='Pasta'";
      $percentage_pasta = $db->query($query);
      $percentage_pasta = (($percentage_pasta->fetch_array()[0])/($total))*100;
      $percentage_pasta = number_format($percentage_pasta,1);

      $query = "SELECT count(*) FROM Favorites WHERE favorites='Pap and Wors'";
      $percentage_pap = $db->query($query);
      $percentage_pap = (($percentage_pap->fetch_array()[0])/($total))*100;
      $percentage_pap = number_format($percentage_pap,1);

      $query = "SELECT AVG(eat) FROM Likes";
      $avg_eating = $db->query($query);
      $avg_eating = number_format($avg_eating->fetch_array()[0],1);

      $query = "SELECT AVG(movies) FROM Likes";
      $avg_movies = $db->query($query);
      $avg_movies = $avg_movies->fetch_array()[0];
      $avg_movies = number_format($avg_movies,1);

      $query = "SELECT AVG(tv) FROM Likes";
      $avg_tv = $db->query($query);
      $avg_tv = $avg_tv->fetch_array()[0];
      $avg_tv = number_format($avg_tv,1);

      $query = "SELECT AVG(radio) FROM Likes";
      $avg_radio = $db->query($query);
      $avg_radio = $avg_radio->fetch_array()[0];
      $avg_radio = number_format($avg_radio,1);

      echo "<b>Total number of surveys: $total</b><br>";
      echo "<b>Average age: $avg_age</b><br>";
      echo "<b>Oldest person who participated in survey: $oldest</b><br>";
      echo "<b>Youngest person who participated in survey: $youngest</b><br>";
      echo "<br>";
      echo "<b>Percentage of people who like Pizza: $percentage_pizza</b><br>";
      echo "<b>Percentage of people who like Pasta: $percentage_pasta</b><br>";
      echo "<b>Percentage of people who like Pap and Wors: $percentage_pap</b><br>";
      echo "<br>";
      echo "<b>People like to eat out: $avg_eating</b><br>";
      echo "<b>People like to watch movies: $avg_movies</b><br>";
      echo "<b>People like to watch TV: $avg_tv</b><br>";
      echo "<b>People like to listen to the radio: $avg_radio</b><br>";
      echo "<br>";
      ?>
<button class='main'>OK</button>
      <script>
      const OK = document.querySelector('.main');
      OK.addEventListener('click',function() {
        window.location.replace('index.html');
      });
      </script>
</body>
</html>
