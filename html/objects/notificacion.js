function leftMove(){
    let boxNotificacion = document.getElementById('box-notificacion').style;
    let titleNotificacion = document.getElementById('title-notificacion').style;
    let descriptionNotificacion = document.getElementById('description-notificacion').style;
    let locationNotificacion = document.getElementById('location-notificacion').style;
    let audio = document.getElementById('sound-notificacion');
    audio.play();
    boxNotificacion.transition = '300ms';
    boxNotificacion.marginLeft = '59.8em';
    setTimeout(() => {
        titleNotificacion.transition = '100ms';
        descriptionNotificacion.transition = '100ms';
        locationNotificacion.transition = '100ms';
        titleNotificacion.opacity = '100%';
        descriptionNotificacion.opacity = '100%';
        locationNotificacion.opacity = '100%';
    }, 200);
    setTimeout(() => {
        titleNotificacion.transition = '0ms';
        descriptionNotificacion.transition = '0ms';
        locationNotificacion.transition = '0ms';
        titleNotificacion.opacity = '0%';
        descriptionNotificacion.opacity = '0%';
        locationNotificacion.opacity = '0%'; 
        boxNotificacion.transition = '300ms';
        boxNotificacion.marginLeft = '100em';
    }, 5000);
}