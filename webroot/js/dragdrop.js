function allowDrop(event) {
    event.preventDefault();
}


function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.files;

    // Processar a imagem enviada para o servidor usando AJAX ou algo similar.
    var file = data[0]; // Assume que apenas uma imagem foi arrastada

    // Coloque o código do AJAX aqui para enviar a imagem para o servidor
    var formData = new FormData();
    formData.append('file', file);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/imagens/upload', true);

    xhr.onload = function () {
        var response = JSON.parse(xhr.responseText);
        alert(response.message);
    };

    xhr.send(formData);
}

document.getElementById('enviarImagem').addEventListener('click', function () {
    var fileInput = document.getElementById('imagemInput');
    var descricaoInput = document.getElementById('descricaoInput');
    var cartaIdInput = document.getElementById('cartaId');

    var file = fileInput.files[0];
    var descricao = descricaoInput.value;
    var cartaId = cartaIdInput.value;

    var formData = new FormData();
    formData.append('file', file);
    formData.append('descricao', descricao);
    formData.append('cartaId', cartaId);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/cards/upload', true);

    xhr.onload = function () {
        var response = JSON.parse(xhr.responseText);
        alert(response.message);
    };

    xhr.send(formData);
});
