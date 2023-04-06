<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Список работ</title>
 </head>
 <body>
    <a href="../index.html">Вернуться в самое начало<a></a>
    <div style="text-align:center;">
    <h3>Данные из БД:</h3>
<?php
    $conn = new mysqli("localhost", "root", "", "vstu_work_db");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    
    $login = $conn->real_escape_string($_GET["login"]);
    $password = $conn->real_escape_string($_GET["password"]);

    $sql = "SELECT * from User where login='$login' and password='$password'";
    $user_db = $conn->query($sql);

    if ($user_db->num_rows > 0) {
        while($user = $user_db->fetch_assoc()) {
            echo 'Пользователь № '.$user["id_user"].'<br>';
            echo 'Ваш username: '.$user["login"].'<br>';
            echo 'Описание: '.$user["comment"]."<br>";
            echo 'Файл резюме: <a href="files_post/'.$user["rezume"].'">Посмотреть</a><br>';

            $fk_mv = $user["fk_mw"];
            $fk_city = $user["fk_city"];
            $id_user = $user["id_user"];

            $sql=" SELECT DISTINCT name 
                FROM user 
                JOIN select_interest ON user.id_user = select_interest.fk_user 
                JOIN interest ON select_interest.fk_interest = interest.id_interest 
                WHERE user.id_user = '$id_user' 
                ORDER BY interest.name;
            ";
            $list_interest = $conn->query($sql);
            $str_list_interest=" | ";
            
            while ($interes = $list_interest->fetch_array()) {
                $str_list_interest= $str_list_interest.$interes["name"]." | ";
            }
            echo "Интересы: [".$str_list_interest."]<br>";

            $city = $conn->query("SELECT name FROM city WHERE '$fk_city'=city.id_city");
            $mv = $conn->query("SELECT name FROM mw WHERE '$fk_mv'=mw.id_mw");
            while ($city_text = $city->fetch_assoc()) {
                echo "Город: ".$city_text["name"]."<br>";
            }
            $mv_text = $mv->fetch_assoc();
            echo "Пол: ".$mv_text["name"];
            
        }
      } else {
        echo "Неверный логин или пароль!";
    }
    	
    
    $conn->close();
?>
    </div>
    
 </body>
</html>