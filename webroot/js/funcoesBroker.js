/**
 * Documento js que contêm as funções necessárias para a comunicação
 * com o server, para acesso e atualização do html de acordo com as mensagens
 * recebidas do Broker.
 */
if (document.readyState === "loading") {  // Ainda carregando
    // console.log(document.readyState);
    document.addEventListener("DOMContentLoaded", manipulaDom);
}

/**Função de manipulação de objeto DOM
Função adiciona chamadada função "funcaoButton3" ao button de id "meuBotao3"*/
function manipulaDom() {
    var buttonPub = document.getElementById("BotaoPublicaMsg");
    buttonPub.onclick = fButtonPub;
    var buttonIniSub = document.getElementById("BotaoIniciaBuscasMsg");
    buttonIniSub.onclick = fButtonIBMsg;
    var buttonStopSub = document.getElementById("BotaoParaBuscaMsg");
    buttonStopSub.onclick = fButtonPMsg;
    buttonStopSub.disabled = true;
}

function fButtonPub()
{
    //console.log("aqui foi");
    $.ajax(
        {
            url: '/logdevices/publishMsg', // Substitua "controller" e "action" pelos nomes reais da sua controller e ação
            type: 'GET',
            data: {
                msg: document.getElementById("MsgTeste").value// Substitua 'param' pelo nome do parâmetro e 'value' pelo valor desejado
              },
            success: function (response) {
                // Ação a ser executada quando a solicitação for bem-sucedida
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Ação a ser executada em caso de erro
                console.error(error);
            }
        }
    );
}
async function fButtonIBMsg()
{
    document.getElementById("BotaoIniciaBuscasMsg").disabled = true;
    document.getElementById("BotaoParaBuscaMsg").disabled = false;
    await reqSubServer();
}
function fButtonPMsg()
{

}
/**Função de sleep que realiza espera na thread de execução do código*/
function sleep(ms) {
    return new Promise(
        resolve => setTimeout(resolve, ms)
    );
}
/**Função assíncrona utilizada para testes que atualiza o html de forma assíncrona
 * não impactando na interatividade com o usuário, enquanto o script está em execução
 */
async function loopComTimeOut() {
    // console.log("Hello");
    // await sleep(2000);
    // console.log("World!");
    // console.log("Goodbye!");
    await sleep(5000);
    while (true) {
        var divEl = document.getElementById("divMensagens");
        const para = document.createElement("p");
        const node = document.createTextNode("Meu texto vai aqui.");
        para.appendChild(node);

        divEl.appendChild(para);
        await sleep(3000);
    }
}
/**
 * Função de comunicação do js com o php para interromper a recepção das mensagens do Broker
 */
async function funcaoButton3() {
    bMantemloop = false;
    // await loopComTimeOut();
    // while (true)
    // {
    // setTimeout(() => loopComTimeOut, 2000);
    // }
    //document.getElementById("meuBotao2").disabled = false;

    //document.getElementById("meu_target").appendChild(divEl)


    $.ajax(
        {
            url: '/logdevices/pararVarreduraMensagens', // Substitua "controller" e "action" pelos nomes reais da sua controller e ação
            type: 'GET',
            success: function (response) {
                // Ação a ser executada quando a solicitação for bem-sucedida
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Ação a ser executada em caso de erro
                console.error(error);
            }
        }
    );
};

async function reqSubServer() {
    //self.postMessage("teste");
    console.log("teste");
    $.ajax(
        {
            url: '/logdevices/subscribeMsg', // Substitua "controller" e "action" pelos nomes reais da sua controller e ação
            type: 'GET',
            success: function (response) {
                // Ação a ser executada quando a solicitação for bem-sucedida
                //self.postMessage(response);
                console.log(response);
                // let divEl = document.getElementById("divMensagens");
                // const para = document.createElement("p");
                // const node = document.createTextNode("Meu texto vai aqui.");
                // para.appendChild(node);
            },
            error: function (xhr, status, error) {
                // Ação a ser executada em caso de erro
                //self.postMessage(response);
                console.error(error);
            }
        }
    );
}

  //<!--TODO: Verificar implementação de sistema de mensageria-->
  //<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  //<script>

  //document).ready(function() {
  //  var bMantemloop = true;
  //$('#meuBotao').click(function() {
  //  $.ajax({
  //    url: '/logdevices/publishMsg', // Substitua "controller" e "action" pelos nomes reais da sua controller e ação
  //    type: 'GET',
  //    success: function(response) {
  //      // Ação a ser executada quando a solicitação for bem-sucedida
  //      console.log(response);
  //    },
  //    error: function(xhr, status, error) {
  //      // Ação a ser executada em caso de erro
  //      console.error(error);
  //    }
  //  });
  //});

  //var worker = new Worker('funcoesjavascriptprojeto.js');
    //worker.addEventListener('message', function(e) {
    //    var result = e.data;
    //    console.log('Resultado recebido do Web Worker:', result);
    //});
    // var button2 = document.getElementById("meuBotao2");
    // button2.click(function() {
    //     document.getElementById("meuBotao2").disabled = true;
    //     iniciaWorker();
    //     worker.postMessage();
    // });

  //});


