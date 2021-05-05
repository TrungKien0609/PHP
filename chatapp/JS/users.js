const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
 usersList = document.querySelector(".users .user_list");
searchBtn.onclick = function(){
    searchBar.classList.toggle("active"); 
    searchBar.focus();
    searchBar.value = "";
    searchBtn.classList.toggle("active"); 
}
searchBar.onkeyup = function(){
    let searchTerm = searchBar.value;
    let myJSON = JSON.stringify(searchTerm); 
    if(searchTerm != "")
    {
         searchBar.classList.add("active");
    }
    else
    {
        searchBar.classList.remove("active");
    }
    if(searchBar.classList.contains("active")){
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("POST", "filephp/search.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
    }
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + myJSON); 
    }
}

setInterval(function(){
    
    let xhr = new XMLHttpRequest(); //creating XML Oject
    xhr.open("GET", "filephp/user_server.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE)
            if (xhr.status === 200) {
                let data = xhr.response;
                if(!searchBar.classList.contains("active"))
                {
                usersList.innerHTML = data;
                }
            }
    }
    xhr.send();
},500); // this funtion will run frequently after 500ms
// using GET method because we need to recieve data not to send
