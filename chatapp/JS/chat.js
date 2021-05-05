const form = document.querySelector(".typing_area");
sendBtn = form.querySelector("button"),
inputField = form.querySelector(".input_field"),
chatBox = document.querySelector(".chat_box");
form.onsubmit = function(e){
    e.preventDefault();
}
sendBtn.onclick = function(){
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("POST", "filephp/chat_server.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                inputField.value = ""; // gửi xong thì làm trống ô nhập 
                scrollToBottom();
            }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}
setInterval(function(){
    
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("POST", "filephp/get_chat.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                let data = xhr.response;
                   chatBox.innerHTML =  data;
            }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
},500);
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}