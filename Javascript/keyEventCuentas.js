function bloquearKeySpace(){
    document.getElementById('UsuarioUserID').addEventListener('keydown', function(event) {
        if (event.code === 'Space') {
            event.preventDefault();
        }
    });
    document.getElementById('passwordUserID').addEventListener('keydown', function(event) {
        if (event.code === 'Space') {
            event.preventDefault();
        }
    });
}
