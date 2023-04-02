<?php 
    require_once 'counter.php';
    require_once 'shower.php';

    $count = counter();
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Страница приветствия</title>
 </head>
 <body style="background-color: rgb(146, 223, 163);">

<style type="text/css">
   td, th {
    padding: 3px;
    border: 1px solid black;
   }

   th {
    background: #b0e0e6;
   }

   table {
    text-align: center; 
    margin-left: auto; 
    margin-right: auto; 
    border-collapse: collapse; 
    border: 1px solid black;
   }

   .counter {
        height: 25px;
        width: 25px;
        background-color:bisque;
        text-align:center;
   }
   .hello {
        margin-left: auto;
        margin-right: auto;
        width: fit-content;
        margin-top: 70px;
   }
</style>

    <div class="counter">
        <p><?= $count ?></p>
    </div>
    <a href="../index.html">Вернуться<a>
    <div class="hello">
        <h1>Григорий Иванин приветствует Вас!</h1>
        <div style="text-align: center;">
        <?php
            if ($count % 10 == 0) {
                $text_img = shower();

                echo '
                    <img src="' . $text_img . '" style="width: 300px;"/>
                    <p>Это ваше посещение №'.$count.'</p>
                    <div style="text-align: center;">
                    <table>
                    <tr >
                        <th>Дата</th>
                        <th>Точное время</th>
                    </tr>
                    <tr>
                        <td>'.date('Y-d-m').'</td>
                        <td>'.date('H:i:s').'</td>
                    </tr>
                    </table>
                    </div>
                ';
            }
        ?>
        </div>
        
    </div>
 </body>
</html>