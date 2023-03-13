function animationMargin(opc){
    var style = document.getElementById('s').style;
    var styleContenido = document.getElementById('contenido-menu').style;
    var style2 = document.body.style;
    style.transition = '300ms';
    style.marginTop = '55px';
    style2.overflow = 'hidden';
}
function animationMarginOff(){
    var style = document.getElementById('s').style;
    var styleContenido = document.getElementById('contenido-menu').style;
    var style2 = document.body.style;
    style.transition = '600ms';
    style2.transition = '1000ms';
    style2.backgroundColor = 'white';
    style.marginTop = '43px';
    styleContenido.transition = '900ms';
    styleContenido.opacity = '0%'
    style2.overflow = 'visible';
    
}