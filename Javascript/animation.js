function animationMargin(){
    var style = document.getElementById('s').style;
    var styleContenido = document.getElementById('contenido-menu').style;
    var style2 = document.body.style;
    style.transition = '1000ms';
    style.marginTop = '84px';
    let contenido ='';
    contenido += '<h1>Categoría</h1><p>Categoría tiene selección de categoría con un id que muestra con un número</br>después escribimos la categoría de del producto, luego le damos al botón registrar</br>categoría, después se mostrará en la tabla. Una vez registrado que se muestre en</br>la tabla de categoría también se actualizará en la interfaz producto.</p><h1>Producto</h1><p>Producto se seleccionara el número de producto que se muestra, luego se</br>introducirá el nombre del producto, Después se seleccionara la categoría del</br>producto y luego se reflejara el precio, posteriormente se le apreté al botón</br>registrar y se reflejara en la tabla.</p>';
    document.getElementById('contenido-menu').innerHTML = contenido;
    styleContenido.transition = '900ms';
    styleContenido.opacity = '100%'
    styleContenido.left = '5%';
    styleContenido.bottom = '72%';
    style2.overflow = 'hidden';
}
function opacidad(){
    var style = document.getElementById('fondo').style;
    var style2 = document.body.style;
    style.transition = '1000ms';
    style2.transition = '1000ms';
    style2.backgroundColor = 'white';
    style.opacity = '0%';
}
function opacidadOff(){
    var style = document.getElementById('fondo').style;
    style.transition = '1000ms';
    style.opacity = '100%';
}
function animationMarginOff(){
    var style = document.getElementById('s').style;
    var styleContenido = document.getElementById('contenido-menu').style;
    var style2 = document.body.style;
    style.transition = '1000ms';
    style2.transition = '1000ms';
    style2.backgroundColor = 'white';
    style.marginTop = '43px';
    styleContenido.transition = '900ms';
    styleContenido.opacity = '0%'
    style2.overflow = 'visible';

}