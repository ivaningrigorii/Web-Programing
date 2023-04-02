<?php
    function shower() {
        $imgs[0] = "imgs/1.png";
        $imgs[1] = "imgs/2.png";
        $imgs[2] = "imgs/3.jpg";

        $rand_number = rand(0, 2);
        return $imgs[$rand_number];
    }
?>