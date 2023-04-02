<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Список работ</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
    <a href="../index.html">Вернуться в самое начало<a></a>
    <div style="text-align:center;">
        <h3>Отображение отправленных сведений</h3>
        <p>Введённый логин: <?php echo $_POST["login"];?></p>
        <p>Введённый пароль: <?php echo $_POST["password"];?></p>
        <p>Пол: <?php echo $_POST["mw"];?></p>
        <p>Интересы:
        <?php
             $interests = $_POST["interest"];
             if (empty($interests)) {
                echo("---");
             } else {
                for($i = 0; $i < count($interests); $i++) {
                    echo($interests[$i] . " / ");
                }
             }
        ?>
        </p>
        <p>Кратко о себе: <?php echo $_POST["comment"];?></p>
        <p>От куда Вы: <?php echo $_POST["city"];?></p>
        
        <?php
            $uploaddir = 'files_post/';
            $uploadfile = $uploaddir . date('Y-m-d_') . basename($_FILES['rezume']['name']);

            if (move_uploaded_file($_FILES['rezume']['tmp_name'], $uploadfile)) {
                echo "Файл резюме загружен.\n\n";
                echo "Краткие сведения: <br>";
                print_r($_FILES);
            } 
        ?>

        <form action="create_rezume.php" method="post">
            <input type="hidden" name="login" value="<?= $_POST["login"] ?>">
            <input type="hidden" name="password" value="<?= $_POST["password"] ?>">
            <input type="hidden" name="mw" value="<?= $_POST["mw"] ?>">
            <input type="hidden" name="interest" value="<?= $_POST["interest"] ?>">
            <input type="hidden" name="comment" value="<?= $_POST["comment"] ?>">
            <input type="hidden" name="city" value="<?= $_POST["city"] ?>">
            <input type="hidden" name="filename" value="<?= $uploadfile ?>">
            <button class="red_submit">Сохранить в БД</button>
        </form>
        

        <form action="show_db.php" method="get" target="_blank">
            <input type="hidden" name="login" value="<?= $_POST["login"] ?>">
            <button class="blue_submit">Просмотр старой анкеты</button>
        </form>
    </div>
 </body>
</html>