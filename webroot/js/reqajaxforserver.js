document.addEventListener('DOMContentLoaded', function () {
    // Seu script aqui
    $(document).ready(function () {
        $('a.apostarbutton').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Markets/realizaapostamarketcont/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    var jsonString = JSON.stringify(data, null, 2);
                    // Manipule os dados recebidos conforme necessário
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });


    $(document).ready(function () {
        $('a.reqtodasligasbtn').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Sports/reqligastodosportall', // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });

    $(document).ready(function () {
        $('a.reqesportsbtn').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'POST',
                url: '/Platforms/requisitaesportescloudbet', // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    var jsonString = JSON.stringify(data, null, 2);
                    if (data.status == 'sucesso') {
                        console.log("sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    } else {
                        console.log("não sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    }
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('a.buscamercadosbutton').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Games/requisitamercadosdojogo/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('a.buscaeventobutton').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');

            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Games/buscaeventodojogo/' + id,
                dataType: 'json',
                success: function (data) {
                    // Verifica a propriedade 'success' no retorno

                    var jsonString = JSON.stringify(data, null, 2);
                    if (data.status == 'sucesso') {
                        console.log("sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    } else {
                        console.log("não sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    }
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert("Erro na requisição AJAX. Verifique o console para mais detalhes.", "Erro!", "error");
                }
            });
        });
    });
    $(document).ready(function () {
        $('a.updateevent').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Events/updateevent/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('a.btnreenviabet').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Bets/reenviabet/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('a.btnatualizabet').click(function (e) {
            e.preventDefault();
            var data = $(this).data('data');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Bets/updatebet/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('.btn-apiaccountinfo').click(function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Platforms/requisitainfoplatform/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('.btn-apiaccountsaldo').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Platforms/requisitasaldoplatform/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('.btnrehistbets').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Platforms/reqhistbet/'+id, // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        $('.btnautteste').click(function (e) {
            e.preventDefault();

            // Faça a chamada AJAX
            $.ajax({
                type: 'GET',
                url: '/Bets/testecronautomate', // Substitua pelo caminho correto
                dataType: 'json', // Se sua action retorna JSON
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });

    $(document).ready(function () {
        $('a.requisicaligassesporte').click(function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            var id = $(this).data('id');

            // Faça a chamada AJAX
            $.ajax({
                type: 'GET', // Ou 'GET' dependendo da sua necessidade
                url: '/Sports/requisitaeventosporesportes/' + id, // Substitua pelo caminho correto
                data: { action: action, id: id },
                dataType: 'json',
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });

    $(document).ready(function () {
        $('.reqeveliga').click(function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            var id = $(this).data('id');
            // Faça a chamada AJAX
            $.ajax({
                type: 'GET', // Ou 'GET' dependendo da sua necessidade
                url: '/Leagues/reqeveligacont/' + id, // Substitua pelo caminho correto
                data: { action: action, id: id },
                dataType: 'json',
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    if (data.status == 'sucesso') {
                        console.log("sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    } else {
                        console.log("não sucesso: " + jsonString);
                        alert(jsonString, data.status, 'success');
                    }
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });


    $(document).ready(function () {
        $('.btnatuallevents').click(function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            var id = $(this).data('id');

            // Faça a chamada AJAX
            $.ajax({
                type: 'POST', // Ou 'GET' dependendo da sua necessidade
                url: '/Leagues/reqevetodasligascont', // Substitua pelo caminho correto
                data: { action: action, id: id },
                dataType: 'json',
                success: function (data) {
                    // Manipule os dados recebidos conforme necessário
                    var jsonString = JSON.stringify(data, null, 2);
                    console.log(data);
                    alert(jsonString, data.status, 'success');
                },
                error: function (error) {
                    console.error('Erro na chamada AJAX:', error);
                    alert('Erro na chamada AJAX:', 'erro', 'error');
                }
            });
        });
    });
});
