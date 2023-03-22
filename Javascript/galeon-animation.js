function animationBoxLoginEnter(){
    let animationBoxRelleno = document.getElementById('box-relleno').style;
    let animationBoxGaleon = document.getElementById('box-galeon').style;
    let animationFondo = document.getElementById('fondo').style;
    let animacionLogo = document.getElementById('logo-galeras').style;
    animationBoxRelleno.transition = '300ms';
    animationBoxGaleon.transition = '300ms';
    animacionLogo.transition = '100ms';
    animationFondo.transition = '100ms';
    animationBoxRelleno.opacity= '100%';
    animacionLogo.opacity = '15%';
    animationBoxRelleno.marginLeft = '4em';
    animationBoxGaleon.opacity = '15%';
    animationFondo.opacity = '16%';
}

function animationBoxLoginStatic(){
    let animationBoxRelleno = document.getElementById('box-relleno').style;
    let animationBoxGaleon = document.getElementById('box-galeon').style;
    let animationFondo = document.getElementById('fondo').style;
    let animacionLogo = document.getElementById('logo-galeras').style;
    animationBoxRelleno.opacity= '100%';
    animacionLogo.opacity = '18%'
    animationBoxRelleno.marginLeft = '4em';
    animationBoxGaleon.opacity = '15%';
    animationFondo.opacity = '16%';
}

function animationBoxLoginOut(){
    let animation = document.getElementById('box-relleno').style;
    let animationBoxGaleon = document.getElementById('box-galeon').style;
    let animationFondo = document.getElementById('fondo').style;
    let animacionLogo = document.getElementById('logo-galeras').style;
    animationBoxGaleon.opacity = '100%';
    animacionLogo.opacity = '100%';
    animation.opacity= '0%';
    animation.marginLeft = '5em';
    animationFondo.opacity = '20%';
}

function enterBoxLogin(){
    let boxError = document.getElementById('box-error-login').style;
    let box = document.getElementById('login-usuario').style;
    box.transition = '80ms';
    box.boxShadow = '0px 0px 15px 3px  rgb(29, 138, 138)';
    boxError.transition = '150ms';
    boxError.paddingLeft = '0%'
}

function exitBoxLogin(){
    let box = document.getElementById('login-usuario').style;
    box.transition = '80ms';
    box.boxShadow = '0px 0px 0px 0px';
}

function enterBoxPassword(){
    let boxError = document.getElementById('box-error-login').style;
    let box = document.getElementById('password-usuario').style;
    box.transition = '80ms';
    box.boxShadow = '0px 0px 15px 3px  rgb(29, 138, 138)';
    boxError.transition = '150ms';
    boxError.paddingLeft = '0%'
}

function exitBoxPassword(){
    let box = document.getElementById('password-usuario').style;
    box.transition = '80ms';
    box.boxShadow = '0px 0px 0px 0px';
}

function enterBoxIngresar(){
    let boxIngresar = document.getElementById('iniciar-sesion').style;
    boxIngresar.transition = '300ms';
    boxIngresar.background = 'rgb(29, 138, 138)';
    boxIngresar.color = 'white';
    boxIngresar.cursor = 'pointer';
}

function outBoxIngresar(){
    let boxIngresar = document.getElementById('iniciar-sesion').style;
    boxIngresar.transition = '200ms';
    boxIngresar.color = 'black';
    boxIngresar.background = 'white';
    boxIngresar.cursor = 'default';
}

function exitboxError(){
    let box = document.getElementById('box-error-login').style;
    box.transition = '100ms';
    box.paddingLeft = '0%';
}
