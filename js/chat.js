const form = document.querySelector(".typing"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".msgsend");
 const chatBox=document.querySelector(".chat_box");
form.onsubmit=(e)=>{
    e.preventDefault();
}
sendBtn.onclick = ()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
              inputField.value="";
                
            }
           
        }
    }
  let form_data= new FormData(form)
   xhr.send(form_data);
}
setInterval(() => {
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
              
                    chatBox.innerHTML = data;
                    
            }
           
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
   
}, 500);