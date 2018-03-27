<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
  <title>Резултати од пребарувањето</title>
</head>
<body>
<center>
<h1>Резултати од пребарувањето</h1>

<?php
  
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'Не се внесени термини за пребарувањето.';
     exit;
  }
   $db = new mysqli('localhost', 'root', '', 'magacin');

  if (mysqli_connect_errno()) {
     echo 'Грешка: Не може да се воспостави конекција со базата.';
     exit;
  }

  $query = "select * from magacin where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Број на пронајдени производи: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". производител: ";
     echo htmlspecialchars(stripslashes($row['title']));
     echo "</strong><br />Име: ";
     echo stripslashes($row['ime']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Цена: ";
     echo stripslashes($row['price']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</center>
</body>
</html>
