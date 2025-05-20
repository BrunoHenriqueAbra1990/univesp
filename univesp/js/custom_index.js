

    document.getElementById('olho').addEventListener('mousedown', function() {
        document.getElementById('password').type = 'text';
    });

    document.getElementById('olho').addEventListener('mouseup', function() {
        document.getElementById('password').type = 'password';
    });

    // Para que o password não fique exposto apos mover a imagem.
    document.getElementById('olho').addEventListener('mousemove', function() {
        document.getElementById('password').type = 'password';
    });

