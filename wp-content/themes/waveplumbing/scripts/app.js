jQuery(document).ready(function () {
    var header = document.querySelector("#header");
    var nav = document.querySelector('#nav');
    var close = document.querySelector('#close');

    nav.addEventListener('click', function (e) {
        header.classList.add('open')
    })

    close.addEventListener('click', function (e) {
        header.classList.remove('open')
    })
});