<!DOCTYPE html>
<html>
<head>

<title>Chat</title>

<style>

body{
font-family:Arial;
background:#ecf0f1;
}

.chat-container{
width:600px;
margin:auto;
margin-top:30px;
background:white;
border-radius:10px;
padding:20px;
}

#chat-box{
height:350px;
overflow-y:scroll;
border:1px solid #ccc;
padding:10px;
margin-bottom:10px;
}

.message{
max-width:60%;
padding:10px;
margin:5px;
border-radius:10px;
clear:both;
word-wrap:break-word;
}

.me{
background:#3498db;
color:white;
float:right;
text-align:right;
}

.other{
background:#bdc3c7;
float:left;
}

.username{
font-size:12px;
font-weight:bold;
margin-bottom:5px;
}

img{
max-width:200px;
border-radius:5px;
}

video{
max-width:200px;
border-radius:5px;
}

.file{
background:white;
padding:5px;
border-radius:5px;
display:inline-block;
margin-top:5px;
}

</style>

</head>

<body>

<div class="chat-container">

<h3>Chat</h3>

<div id="chat-box"></div>

<form id="chat-form" enctype="multipart/form-data">

<input type="text" id="message" placeholder="Escribe mensaje">

<input type="file" id="file">

<button type="submit">Enviar</button>

</form>

</div>

<script>

let receiver = <?= $receiver ?>;
let my_id = <?= session()->get('user_id') ?>;

document.getElementById("chat-form").addEventListener("submit",function(e){

e.preventDefault();

let formData = new FormData();

formData.append("message",document.getElementById("message").value);
formData.append("receiver",receiver);

let file=document.getElementById("file").files[0];

if(file){
formData.append("file",file);
}

fetch('/sendMessage',{
method:'POST',
body:formData
})
.then(()=>{

document.getElementById("message").value="";
document.getElementById("file").value="";
loadMessages();

});

});

function loadMessages(){

fetch('/getMessages/'+receiver)

.then(r=>r.json())

.then(data=>{

let html='';

data.forEach(m=>{

let side = m.sender_id == my_id ? "me" : "other";

html += "<div class='message "+side+"'>";

if(m.sender_id == my_id){
html += "<div class='username'>Yo</div>";
}else{
html += "<div class='username'>Usuario</div>";
}

if(m.type == "text" && m.message){
html += "<div>"+m.message+"</div>";
}

if(m.type == "image" && m.file){
html += "<img src='/uploads/"+m.file+"'>";
}

if(m.type == "video" && m.file){
html += "<video controls src='/uploads/"+m.file+"'></video>";
}

if(m.type == "file" && m.file){
html += "<div class='file'><a href='/uploads/"+m.file+"' download>📄 Descargar archivo</a></div>";
}

html += "</div>";

});

document.getElementById("chat-box").innerHTML = html;

/* bajar automáticamente al último mensaje */

let chatBox = document.getElementById("chat-box");
chatBox.scrollTop = chatBox.scrollHeight;

});

}

loadMessages();

setInterval(loadMessages,2000);

</script>

</body>
</html>