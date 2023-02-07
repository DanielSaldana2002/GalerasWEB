setTimeout(() => {
    var imgFinal = document.getElementById('imagen-galera-finalA').style;
    var imgGalera = document.getElementById('imagen-galeraA').style;
    imgGalera.width = '0';
    imgFinal.opacity = '100%';
    imgFinal.transition = '1000ms';
    imgFinal.marginLeft = '88%';
    imgFinal.width = '8%';


}, 6000);