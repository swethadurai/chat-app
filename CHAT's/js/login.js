const form =document.getElementById("form"),
continuebtn=form.querySelector(".continue"),
errortxt=form.querySelector(".error_text");

form.onsubmit=(e)=>{
    e.preventDefault();
}
continuebtn.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/logindb.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                console.log(data);
                if(data=="success"){
                   location.href="user.php";
                }
                else{
                 errortxt.style.display="block";
                 errortxt.textContent=data;
                }
            }
           
        }
    }
  let form_data= new FormData(form)
   xhr.send(form_data);
}