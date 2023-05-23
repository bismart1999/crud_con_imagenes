function validarFormulario(){
    var formulario = document.addForm;
    const detenerEvento = document.getElementById("addForm");
    if(formulario.name.value == ""){
        detenerEvento.addEventListener('submit', function(event){
            event.preventDefault();
        })
        document.getElementById("alerta").innerHTML = 
        '<div class="alert alert-danger">Favor ingrese su nombre </div>';
        formulario.name.focus();
        return false;
    } else{
        document.getElementById("alerta").innerHTML="";
    }
    if(formulario.email.value == ""){
        detenerEvento.addEventListener('submit', function(event){
            event.preventDefault();
        })
        document.getElementById("alerta").innerHTML = 
        '<div class="alert alert-danger">Favor ingrese su correo electronico </div>';
        formulario.email.focus();
        return false;
    } else{
        document.getElementById("alerta").innerHTML="";
    }
    if(formulario.subject.value == ""){
        detenerEvento.addEventListener('submit', function(event){
            event.preventDefault();
        })
        document.getElementById("alerta").innerHTML = 
        '<div class="alert alert-danger">Favor ingrese su asunto</div>';
        formulario.subject.focus();
        return false;
    } else{
        document.getElementById("alerta").innerHTML="";
    }
    if(formulario.message.value == ""){
        detenerEvento.addEventListener('submit', function(event){
            event.preventDefault();
        })
        document.getElementById("alerta").innerHTML = 
        '<div class="alert alert-danger">Favor ingrese su mensaje </div>';
        formulario.message.focus();
        return false;
    } else{
        document.getElementById("alerta").innerHTML="";
    }
    

    formulario.submit();
}