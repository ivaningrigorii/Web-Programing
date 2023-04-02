<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Список работ</title>
 </head>
 <body>
    <a href="../index.html">Вернуться в самое начало<a></a>
    <?php
    $conn = new mysqli("localhost", "root", "", "vstu_work_db");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM User";
    if($result = $conn->query($sql)){
        foreach($result as $row){
            echo $row["id_user"];
            echo '<br>';
            $login = $row["login"];
            $password = $row["password"];
        }   
    }
    	
    $result->free();
    $conn->close();
?>
 </body>
</html>