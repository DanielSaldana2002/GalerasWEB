function animationMargin(){
    var style = document.getElementById('s').style;
    style.transition = '800ms';
    style.marginTop = '54px';
}
function opacidad(){
    var style = document.getElementById('fondo').style;
    var style2 = document.body.style;
    style.transition = '1000ms';
    style2.transition = '1000ms';
    style2.backgroundColor = 'black';
    style.opacity = '0%';
}
function opacidadOff(){
    var style = document.getElementById('fondo').style;
    style.transition = '1000ms';
    style.opacity = '100%';
}
function animationMarginOff(){
    var style = document.getElementById('s').style;
    var style2 = document.body.style;
    style.transition = '1000ms';
    style2.transition = '1000ms';
    style2.backgroundColor = 'white';
    style.marginTop = '30px';
}
