<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
  <title>Внесување на нов поризвод</title>
</head>
<body>
<h1>Внесување на нов поризвод</h1>

<?php
  
  $isbn=$_POST['isbn'];
  $ime=$_POST['ime'];
  $title=$_POST['title'];
  $price=$_POST['price'];

  if (!$isbn || !$ime || !$title || !$price) {
     echo "Не се внесени податоци во сите полиња.<br />";
     exit;
  }

  $db = mysqli_connect('localhost', 'root', '', 'magacin');
  
  if (mysqli_connect_errno()) {
     echo "Грешка: Не може да се воспостави конекција со базата.";
     exit;
  }
  mysqli_set_charset($db,'utf8');
  $query = "insert into magacin values
            ('".$isbn."', '".$ime."', '".$title."', '".$price."')";
  $result = $db->query($query);

  if ($result) {
     header('Location: index3.html');
  } else {
  	  echo "Записот не може да се додаде во базата.";
  }

  $db->close();
?>
</body>
</html>
