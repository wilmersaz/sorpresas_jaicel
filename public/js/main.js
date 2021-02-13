/**
 * Created by JOSE LUIS OSPINO on 8/11/2018.
 */
if ('serviceWorker' in navigator) {
    //realiza el registro del serviceWorker
    navigator.serviceWorker.register(''+baseUrl+'/js/firebase-messaging-sw.js').then(function(registration) {
        messaging.useServiceWorker(registration);
        messaging.onTokenRefresh(function() {
            messaging.getToken().then(function(refreshedToken) {
                console.log('Token refreshed.');
                setTokenSentToServer(false);
                sendTokenToServer(refreshedToken);
                resetUI();
            }).catch(function(err) {
                console.log('Unable to retrieve refreshed token ', err);
            });
        });
        messaging.onMessage(function(payload) {
            //console.log('Message received. ', payload);
            showNotification(payload.notification.title,payload.notification.body,'',payload.data.tipe);
            if(payload.data.tipe == 'panico'){
                showPanicNotificacionHtml(payload.data.id_servicio, payload.data.nombre_usuario);
            }else{
                listarServicios()
            }
            console.log(payload);

        });

        function resetUI() {
            messaging.getToken().then(function(currentToken) {
                if (currentToken) {
                    var recipient = currentToken;
                    var accesstoken = "key=AIzaSyDNQ_B8AtPZRVCzW1GPuKz95kP_FbU3Wyg";
                    var tokenUltimo = currentToken;
                    /*Registrar a un grupo*/
                    //subscribeTokenToTopic(tokenUltimo,'all')
                    console.log(tokenUltimo)
                }else{
                    requestPermission();
                    setTokenSentToServer(false);
                }
            }).catch(function(err) {
                console.log('An error occurred while retrieving token. ', err);
                setTokenSentToServer(false);
            });
        }

        function sendTokenToServer(currentToken) {
            if (!isTokenSentToServer()) {
                console.log('Enviando token al server...');
                setTokenSentToServer(true);
            } else {
                console.log('El token ya ha sido enviado al servidor, no lo vuelva a enviar a menos que cambie');
            }
        }

        function isTokenSentToServer() {
            return window.localStorage.getItem('sentToServer') === 1;
        }

        function setTokenSentToServer(sent) {
            window.localStorage.setItem('sentToServer', sent ? 1 : 0);
        }

        function requestPermission() {
            console.log('Requesting permission...');
            messaging.requestPermission().then(function() {
                console.log('Permiso verificado');
                resetUI();
            }).catch(function(err) {
                console.log('Imposible solicitar permiso.', err);
            });
        }
        resetUI();
    }).catch(function(error) {
        console.log('Fallo en el registro del SW', error);
    });
} else {
    console.log('SW no es soportado en este navegador');
}


function showNotification(title, msg, icon, tipe){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    if(tipe == 'panico'){
        toastr.error(msg,title);
    }else{
        toastr.info(msg,title);
    }
}

function showNotificationHtml(data){
    $("#servicesDiv").before('<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">'
        +'<div class="m-alert__icon">'
        +'<i class="flaticon-exclamation-1"></i>'
        +'<span></span>'
        +'</div>'
        +'<div class="m-alert__text">'
        +'<strong>Well done!</strong> You successfully read this message.'
        +'</div>'
        +'<div class="m-alert__close">'
        +'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        +'</button>'
        +'</div>'
        +'</div>');
}
function showPanicNotificacionHtml(id,usuario){
    $("#notificationsPanicHtml").before('<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">'
        +'<div class="m-alert__icon">'
        +'<i class="flaticon-exclamation-1"></i>'
        +'<span></span>'
        +'</div>'
        +'<div class="m-alert__text">'
        +'<strong>Alerta! </strong> '+usuario+' Solicita <strong>ayuda urgente</strong> . '
        +'<a href="#" data-toggle="modal" data-id="'+id+'" data-target="#modal_panic_alert" class="btn btn-danger m-btn btn-sm 	m-btn m-btn--icon m-btn--pill">'
        +'<span> <i class="flaticon-eye"></i> <span>Ver Todo</span> </span></a> '
        +'</div>'
        +'<div class="m-alert__close">'
        //+'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        +'</button>'
        +'</div>'
        +'</div>').hide().show('fast');
}
