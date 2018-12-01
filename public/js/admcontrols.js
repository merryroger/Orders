'use strict'

let ddOn = false;
let mlt = 0;

function showDDMenu(src) {
    if (!ddOn) {
        let dd = document.querySelector('#dd_menu');
        dd.classList.toggle('h');
        dd.classList.toggle('v');
        dd.style.top = src.offsetTop + src.offsetHeight + 5 + 'px';
        dd.style.left = src.offsetLeft + 'px';
        dd.addEventListener('mousemove', resetDDClose);
        dd.addEventListener('mouseout', closeDDMenu);
        ddOn = true;
    }
}

function resetDDClose() {
    if (mlt != 0) {
        clearTimeout(mlt);
        mlt = 0;
    }
}

function closeDDMenu() {
    if (ddOn) {
        mlt = setTimeout(shutDDMenu, 1000);
    }
}

function shutDDMenu() {
    if (ddOn) {
        let dd = document.querySelector('#dd_menu');
        dd.removeEventListener('mouseout', closeDDMenu);
        dd.removeEventListener('mousemove', resetDDClose);
        dd.classList.toggle('v');
        dd.classList.toggle('h');
        ddOn = false;
        mlt = 0;
    }
}

function requestEntity(route) {
    document.location.href = route;
    return false;
}

function removeEntity(route, warning) {
    if (confirm(warning)) {
        let fm = document.querySelector('#rm_form');
        fm.action = route;
        fm.submit();
    }

    return false;
}
