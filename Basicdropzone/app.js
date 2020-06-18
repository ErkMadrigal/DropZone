(() => {
    'use strict';
    window.addEventListener('load', () => {

        var forms = document.getElementsByClassName('needs-validation');

        Array.prototype.filter.call(forms, (form) => {
        form.addEventListener('submit',  (event) => {
            event.preventDefault();
            event.stopPropagation();
            if (form.checkValidity()){
                let data = new FormData(forms[0]);
                // data.append("opcion","registrarUsuario");
                let url = "upload.php";
                fetchAPI(url, "POST", data) 
                .then((data)=>{
                    console.log(data)
                })
                .catch((e)=>console.error(e));
            }
            form.classList.add('was-validated');
            }, false);
        }); 

    }, false);
})();

const fetchAPI = async( url , method , data ) =>{
    let resp =  await fetch(url,{
        method :  method,
        body : data 
    });
    return resp.json();
}