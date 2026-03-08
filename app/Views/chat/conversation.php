<h2>Chat</h2>

<div id="chat-box"></div>

<input id="message">

<button onclick="send()">Enviar</button>

<script>

let receiver=<?= $receiver ?>

function send(){

fetch('/sendMessage',{

method:'POST',

body:new URLSearchParams({

message:document.getElementById('message').value,

receiver:receiver

})

})

}

setInterval(()=>{

fetch('/getMessages/'+receiver)

.then(r=>r.json())

.then(data=>{

let html=''

data.forEach(m=>{

html+=m.message+"<br>"

})

document.getElementById('chat-box').innerHTML=html

})

},2000)

</script>