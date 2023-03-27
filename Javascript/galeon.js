function validadorInicioSesion(){
    let boxUser = document.getElementById('login-usuario').style;
    let usuario = document.getElementById('login-usuario').value;
    let password = document.getElementById('password-usuario').value;
    let passwordDiseño = document.getElementById('password-usuario').style;
    let boxErrorDiseño = document.getElementById('box-error-login').style;
    let boxError = document.getElementById('message-error-login');
    let aux, val = false;
    var requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    fetch("http://localhost:3000/BaseDeDatos/1", requestOptions)
        .then(response => response.text())
        .then(result => cuentas(result))
        .catch(error => console.log('error', error));
    const cuentas = (data) =>{
        let cuentasLista = JSON.parse(data);
        for(let i = 0; i<cuentasLista.listaCuentasAdmi.length; i++){
            if(cuentasLista.listaCuentasAdmi[i].usuario_sesion == usuario){
                val = true;
                aux = i;
                i = cuentasLista.listaCuentasAdmi.length;
            }else{
                val = false;
            }
        }
        if(val == true){
            if(cuentasLista.listaCuentasAdmi[aux].contrasena_sesion == password){
                if(cuentasLista.listaCuentasAdmi[aux].fk_id_tipo_cuentas == 1){
                    window.open("/html/index-galeon.html")
                }else if(cuentasLista.listaCuentasAdmi[aux].fk_id_tipo_cuentas == 2){
                    alert('El usuario es tipo de cuenta estandar, unicamente pueden acceder los tipo de cuenta administradores');
                }
            }else{
                boxError.innerHTML = 'La contraseña es incorrecta';
                passwordDiseño.transition = '300ms';
                passwordDiseño.boxShadow = '0px 0px 15px 3px rgb(112, 9, 9)';
                boxErrorDiseño.transition = '300ms';
                boxError.style.marginLeft = '-13em';
                boxErrorDiseño.paddingLeft = '30%';
            }
        }else{
            boxError.innerHTML = 'El usuario no existe o es incorrecto';
            boxUser.transition = '300ms';
            boxUser.boxShadow = '0px 0px 15px 3px rgb(112, 9, 9)';
            boxErrorDiseño.transition = '300ms';
            boxError.style.marginLeft = '-17.5em';
            boxErrorDiseño.paddingLeft = '40%';
        }
    }
}

function traerInformacion(){
    let titulo = document.getElementById('title-login1').innerHTML;
    console.log(titulo);
}