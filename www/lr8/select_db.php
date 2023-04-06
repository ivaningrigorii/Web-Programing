<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Список работ</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
    <a href="../index.html">Вернуться в самое начало<a></a>
    <style type="text/css">
    TABLE {
        width: 300px; /* Ширина таблицы */
        border-collapse: collapse; /* Убираем двойные линии между ячейками */
    }
    TD, TH {
        padding: 3px; /* Поля вокруг содержимого таблицы */
        border: 1px solid black; /* Параметры рамки */
    }
    TH {
        background: #b0e0e6; /* Цвет фона */
    }
    </style>
    <div style="text-align:center;">
        <h3> Выбор таблицы </h3>
        <?php
            $conn = new mysqli("localhost", "root", "", "vstu_work_db");
            if($conn->connect_error){
                die("Ошибка: " . $conn->connect_error);
            }

            $tables = $conn->query("SHOW TABLES;");
            echo '<form method="get" action="select_db.php">';
            echo '<select name="ts">';
            echo '<option disabled selected value="" style="display:none"></option>';
            while($t = $tables->fetch_assoc()) {
                $name = $t["Tables_in_vstu_work_db"];
                echo "<option value=".$name.">".$name."</option>";
            }
            echo '</select>';
            echo '<br><button type="submit">Выгрузить данные</button>';
            echo '</form>';

            $ts = $conn->real_escape_string($_GET["ts"]);
            $sql = "SELECT * FROM `$ts`";
            if ($qu = mysqli_query($conn, $sql)) {
                $nf_sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$ts'";
                $nf = mysqli_query($conn, $nf_sql);
                echo '<div style="text-align: center; width: margin-left: auto; margin-right: auto;">';
                echo '<table style="text-align:center; margin-left: auto; margin-right: auto;">';
                echo '<tr>';
                if ($ts != 'user'){
                    while ($head = mysqli_fetch_assoc($nf)) {
                        echo "<th>".$head["column_name"]."</th>";
                    }
                } else {
                    $headers_for_user = array( "id_user", "login", "password", 
                        "comment", "rezume", "fk_mw", "fk_city"
                    );
                    foreach ($headers_for_user as &$val) {
                        echo "<th>".$val."</th>";
                    }
                }
                echo '</tr>';
                
                $i = 0; 
                while ($result = mysqli_fetch_row($qu)) {
                    echo '<tr>';
                    foreach($result as &$value){
                        echo '<td>'.$value.'</td>';
                    }
                    echo '</tr>';
                    $i++;
                }
                echo "</table>";
                echo '</div>';
            }
            $conn->close();
            
        ?>
    </div>
    
 </body>
</html>