setTimeout(() => {
    var imgFinal = document.getElementById('imagen-galera-finalA').style;
    var imgGalera = document.getElementById('imagen-galeraA').style;
    var fondo = document.body.style;
    imgGalera.width = '0';
    imgFinal.opacity = '100%';
    imgFinal.transition = '1000ms';
    fondo.transition = '1100ms';
    fondo.backgroundColor = 'black'
    fondo.opacity = '0%'
    imgFinal.marginLeft = '90%';
    imgFinal.width = '8%';
}, 6000);

setTimeout(() => {
    location.href = 'http://127.0.0.1:5501/html/index.html';
}, 6750);