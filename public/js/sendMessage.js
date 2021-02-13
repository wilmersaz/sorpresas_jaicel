endpoint = "https://cordova-plugin-fcm.appspot.com"
function sendPush(){

    document.getElementById('sendButton').disabled = 'true'
    document.getElementById('sendButtonText').innerHTML = 'Sending...'
    if( document.getElementById('saveData').checked ) saveData();
    else delData();
    var customDataFixed = customData.slice(0, customData.length-1)

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4){
            document.getElementById('sendButton').removeAttribute('disabled')
            document.getElementById('sendButtonText').innerHTML = 'Send'
            if(xhttp.status == 200){
                var response = JSON.parse(xhttp.responseText);
                console.log( response );
                if(response.result == 1) alert( 'ERROR: ' + response.message )
                else alert( 'Push notification sent successfully!' )
            }
        }
    };
    xhttp.open("POST", endpoint+'/push/freesend', true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.setRequestHeader("Access-Control-Allow-Origin", "*");
    var payload={
        recipient:document.getElementById('recipient').value,
        isTopic:document.getElementById('isTopic').checked,
        title:document.getElementById('title').value,
        body:document.getElementById('body').value,
        apiKey:document.getElementById('apiKey').value,
        application:document.getElementById('application').value,
        customData:customDataFixed
    }
    xhttp.send(JSON.stringify(payload));
}