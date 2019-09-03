<?php
$host = "localhost";
$user = "id9791891_lulu98";
$password = "a1b2c3d4";
$database = "id9791891_luludb";

// 1. Verbindungsaufbau zum DBMS (Zugangsdaten aus .my.cnf):
$connection = new mysqli($host , $user , $password , $database);
// 2. Ausführen der SELECT -Quexry:
$result = $connection->query("SELECT * FROM tetris ORDER BY score DESC LIMIT 10;");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Show Highscore</title>
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
    <style>
      body{
        text-align:center;
        color:white;
        font-family:'Orbitron';
        background-color:black;
      }

      a{
        font-size:30px;
        color:white;
        text-decoration:none;
      }

      a:hover{
        color:grey;
      }
    </style>
</head>
<body>
    <h1>Highscore</h1>
    <table style="width:50%;margin:auto;border:1px solid white;">
      <tr>
        <th>Score</th>
        <th>Name</th>
      </tr>
      <?php
      while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $score = $row['score'];
        echo "
          <tr>
            <td>$score</td>
            <td>$name</td>
          </tr>
        ";
      }
      echo "</table>";
      echo "<p><a href=\"../index.html\">Main Page</a></p>";
      ?>
  </table>
</body>
</html>
<?php
// Ressourcen des Result -Sets freigeben
$result ->free();
// 4. Verbindungsabbau zum DBMS:
$connection ->close();
 ?>
