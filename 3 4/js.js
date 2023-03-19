/* eslint-disable */

function find_dw(str) {
    return ((str.search(/\d/) == -1) || (str.search(/[a-zа-яё]/) == -1));
}

function validate() {
    var fio = new Array();
        
        fio.push($("#f").val());
        fio.push($("#i").val());
        fio.push($("#o").val());
        
        var mw = $("#mw").val();
        var log = $("#login").val();
        var pas = $("#password").val();
        var email = $("#email").val();

        var str_empty = false;
        fio.forEach(function(elem){
           if (elem=='') {
               str_empty = true;
           }
        }); 
    
        if (str_empty) {
            alert("Вы не полностью ввели ваше ФИО!");
        } else if (email == '') {
            alert("Вы не ввели вашу почту!");
        } else if ((log.length < 7)||(find_dw(log))) {
            alert("Логин должен содержать не менее 7 символов, содержать буквы И цифры.");
        } else if ((pas.length < 8)||(find_dw(pas))) {
            alert("Пароль должен содержать не менее 7 символов, содержать буквы И цифры.");
        }else if (email.search("@") == -1) {
            alert("Вы неверно ввели почту!");
        } else {
            if (confirm("Вы уверены, что точно ввели данные?")) {
                window.location.href = 'ok.html';
            }
        }
}

function goto_about_me() {
    window.location.href = 'about_me.html';
}

function goback() {
    window.location.href = 'index.html';
}

function show_message() {
    alert("Регистрация на сайте представляет собой внесение данных о себе для создания личного профиля.");
}

function re() {
    prompt("Крутая страничка? Почему?");
}

function fffunction() {
    var elements = ["--", "\\", "|", "/", "--", "\\", "|", "/"];
    let i = 0, count = 0;
    let intr = setInterval(() => {
        document.getElementById("fff12345").innerHTML = elements[i];
        i++; count++;
        
        if (i==elements.length) {
            i = 0;
        };
        
        if (count==16) {
            clearInterval(intr);
        }
        
    }, 100);
}

function r_o_c() {
    return Math.round(255.0*Math.random());
}

function rnd_color() {
    let r = r_o_c().toString(16);
    let g = r_o_c().toString(16);
    let d = r_o_c().toString(16);
    
    return r+g+d;
}

function change_color(str_id) {
    var textbox = document.getElementById(str_id.toString());
    textbox.style.color = "#"+rnd_color();
}

function playPause() {
    var myVideo = document.getElementById('myvideo'); 

    myVideo.paused ? myVideo.play() : myVideo.pause();
}


