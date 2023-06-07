// Form validation


function formValidation(){

    if(document.formData.nombre.value.length === 0){

        alert("El campo 'Nombre' está vacío.");
        return false;

    }else if(document.formData.nombre.value.trim() === ""){
        alert("El campo 'Nombre' es requerido.");
        return false;

    }else if(document.formData.nombre.value.match(/[0-9]/)){
        alert("El campo 'Nombre' solo admite letras.");
        return false;
    }

    if((/^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/.test(document.formData.email.value) === 0) || (document.formData.email.value.length === 0)){
        alert("El formato del email es incorrecto");
        return false;
    }

    if(document.formData.telefono.value.length === 0){
        alert("El campo 'Teléfono' es requerido.");
        return false;

    } else if(document.formData.telefono.value.length<9 || document.formData.telefono.value.length>9){
        alert("El campo 'Teléfono' debe constar de 9 dígitos");
        return false;

    }

    document.formData.submit();

} 