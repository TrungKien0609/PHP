// Ajax for signup form
const form = document.querySelector(".login form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error_txt");

form.onsubmit = function (e) {
    e.preventDefault(); //preventing form from submitting
}
continueBtn.onclick = function () {
    // let's start ajax
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("POST", "filephp/login_server.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                let data = xhr.responseText.trim();
                if ( data === "success") { 
                    location.href = "user.php";
                }
                else
                {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form) // creating a new FormData object
    xhr.send(formData); // sending formdata to PHP

};