const passwordField = document.querySelector(".form .field input[type='password']");
togglebtn = document.querySelector(".form .field i");
togglebtn.onclick = function(){
    if(passwordField.type == "password"){
        passwordField.type = "text";
        togglebtn.classList.add("active");
    }
    else
    {
        passwordField.type = "password";
        togglebtn.classList.remove("active");
    }
}
