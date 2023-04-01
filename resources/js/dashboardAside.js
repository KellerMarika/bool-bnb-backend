

import './bootstrap';
import '~resources/scss/app.scss';
import.meta.glob([
    '../img/**'
])

/* {{-- SET ACTIVE TO TOGGLE AND LIST ITEMS --}} */
        let menuToggle = document.querySelector('.toggle')
        let Navigation = document.querySelector('.navigation')

        let active_Section
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active')
            Navigation.classList.toggle('active')

        }

        let list = document.querySelectorAll('.list');

        for (let i = 0; i < list.length; i++) {
            list[i].onclick = function(e) {
                console.log(e);
                console.log(e.srcElement.id);
                console.log(e.target);
                console.log(e.target.parentElement.id);
                let j = 0;
                while (j < list.length) {
                    list[j++].className = 'list'
                }
                list[i].className = 'list active';
            }
        }


/* 
    {{-- icone --}} */
/*         $(document).ready(function() {
            $(".open").click(function() {
                $(".nav-title").css('display', 'block');

            });
            $(".close").click(function() {
                $(".nav-title").css('display', 'none');
            });
        }); */

