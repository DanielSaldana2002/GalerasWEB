function animationBoxLoginEnter(){
    let animationBoxRelleno = document.getElementById('box-relleno').style;
    let animationBoxGaleon = document.getElementById('box-galeon').style;
    let animationFondo = document.getElementById('fondo').style;
    animationBoxRelleno.transition = '300ms';
    animationBoxGaleon.transition = '300ms';
    animationFondo.transition = '100ms';
    animationBoxRelleno.opacity= '100%';
    animationBoxRelleno.marginLeft = '4em';
    animationBoxGaleon.opacity = '15%';
    animationFondo.opacity = '8%'
}
function animationBoxLoginOut(){
    let animation = document.getElementById('box-relleno').style;
    let animationBoxGaleon = document.getElementById('box-galeon').style;
    let animationFondo = document.getElementById('fondo').style;
    animationBoxGaleon.opacity = '100%';
    animation.opacity= '0%';
    animation.marginLeft = '5em';
    animationFondo.opacity = '20%';
}