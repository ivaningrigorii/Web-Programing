<?php

    $conn = new mysqli("localhost", "root", "", "vstu_work_db");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }

    $login = $conn->real_escape_string($_POST["login"]);

    if ($conn->query("SELECT * from user WHERE user.login = '$login'") != null){
        $conn->query("DELETE FROM user WHERE user.login='$login'");
        echo '<p>Всё ок</p>';
    }

    $password = $conn->real_escape_string($_POST["password"]);
    $comment = $conn->real_escape_string($_POST["comment"]);
    $rezume = $conn->real_escape_string($_POST["filename"]);

    $city_text = $conn->real_escape_string($_POST["city"]);
    $mw_text = $conn->real_escape_string($_POST["mw"]);

    $city_ = $conn->query("SELECT id_city FROM city WHERE name='$city_text'  LIMIT 1");
    while ($row = $city_->fetch_assoc()) {
        $city = $row['id_city'];
    }

    $mw_ = $conn->query("SELECT id_mw FROM mw WHERE name='$mw_text'  LIMIT 1");
    while ($row = $mw_->fetch_assoc()) {
        $mw = $row['id_mw'];
    }

    $sql = "INSERT INTO user (login, password, comment, rezume, fk_city, fk_mw) 
     VALUES ('$login', '$password', '$comment', '$filename', '$city', '$mw')";

    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }

    
    $interests[] = $_POST["interest"];
    echo $_POST["interest"];
    $id_user_ = $conn->query("SELECT id_user from user WHERE user.login='$login' LIMIT 1");
    while ($row = $id_user_->fetch_assoc()) {
        $id_user = $row['id_user'];
    }
    echo '<p>дошли</p>';


    for($i = 0; $i < count($interests); $i++) {
        $int = $interests[$i];
        echo $int;
        $interest = $conn->query("SELECT * FROM interest WHERE name='$int'");
        while ($row = $interest->fetch_assoc()) {
            $int_ = $row['id_interest'];
        }
        $conn->query("INSERT INTO select_interest (fk_interest, fk_user) values ('$int_', '$id_user')");
    }
    

    $conn->close();
?>