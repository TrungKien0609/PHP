// Ajax for signup form
const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error_txt");

form.onsubmit = function (e) {
    e.preventDefault(); //preventing form from submitting để fomr submit thông qua ajax . Nếu không có dòng này form sẽ submit tới cái file trong thuộc tính action
}
continueBtn.onclick = function () {
    // let's start ajax
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("POST", "filephp/signup.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                let data = xhr.responseText.trim();
                if (data === "success") {  
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
    let formData = new FormData(form) // creating a new FormData object , trình duyệt đã hổ trợ gửi form thông qua Fromdata . Nếu trình duyệt không hổ trợ thì phải sử dụng 
    // Xhr.requestHeader("kiểu dữ liệu gửi vd Json thì dùng Content-type","aplicaiton/x-www-form-urlencoded") thông qua x-www-form-urlencoded( bị giới hạn dung lượng data khi gửi)
    // muốn không bị giới hạn thì dùng aplicaiton/multipart/form-data
    xhr.send(formData); // sending formdata to PHP

};