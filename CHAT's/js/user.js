usersList=document.querySelector(".user_list");
const searchbar=document.getElementById("searchInput");
searchIcon = document.querySelector(".search");
searchIcon.onclick = ()=>{
    searchbar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchbar.focus();
    if(searchbar.classList.contains("active")){
      searchbar.value = "";
      searchbar.classList.remove("active");
    }
  }

searchbar.onkeyup=()=>{
    let searchTerm = searchbar.value;
    if(searchTerm != ""){
      searchbar.classList.add("active");
    }else{
      searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersList.innerHTML = data;
          }
        }
    }  
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}
setInterval(() => {
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/user.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                if(!searchbar.classList.contains("active")){
                    usersList.innerHTML = data;
                  }                
            }
           
        }
    }
    xhr.send();
}, 500);