function objetoXHR() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        var versionesIE = new Array('MsXML2.XMLHTTP.5.0', 'MsXML2.XMLHTTP.4.0',
            'MsXML2.XMLHTTP.3.0', 'MsXML2.XMLHTTP', 'Microsoft.XMLHTTP');
        for (var i = 0; i < versionesIE.length; i++) {
            try {
                return new ActiveXObject(versionesIE[i]);
            } catch (errorControlado) { }
        }
    }
    throw new Error("No se pudo crear el objeto XMLHTTPRequest");
}



function validardireccion() {
    let inputdireccion = $("#direccion");
    let loading = $("#loading");
    loading.removeClass("invisible");
    incluirSpinner(inputdireccion);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticiondireccion;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("direccion=" + inputdireccion.val());

}



function validarimporte() {
    let inputimporte = $("#importe");
    let loading = $("#loading2");
    loading.removeClass("invisible");
    incluirSpinner(inputimporte);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionimporte;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("importe=" + inputimporte.val());
}

function validar_id_usuarios() {
    let inputid_usuarios = $("#id_usuarios");
    let loading = $("#loading3");
    loading.removeClass("invisible");
    incluirSpinner(inputid_usuarios);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionid_usuarios;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("id_usuarios=" + inputid_usuarios.val());
}


function validarFormulario() {
    event.preventDefault();
    validacionFormularioAjax();

}

function validacionFormularioAjax() {
    $("#modal").modal("show");
    let inputdireccion = $("#direccion");
    let inputimporte = $("#importe");
    let inputid_usuarios = $("#id_usuarios");
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionFormulario;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("direccion=" + inputdireccion.val() + "&" + "importe=" + inputimporte.val() + "&" + "id_usuarios=" + inputid_usuarios.val());


}


function comprobarEstadoPeticiondireccion() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputdireccion = $("#direccion");
        gestionarErrores(inputdireccion, errores.direccion);
        let loading = $("#loading");
        loading.addClass("invisible");
    }
}

function comprobarEstadoPeticionimporte() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#importe");
        gestionarErrores(input, errores.importe);
        let loading = $("#loading2");
        loading.addClass("invisible");
    }
}


function comprobarEstadoPeticionid_usuarios() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#id_usuarios");
        gestionarErrores(input, errores.id_usuarios);
        let loading = $("#loading3");
        loading.addClass("invisible");
    }
}

function comprobarEstadoPeticionFormulario() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputdireccion = $("#direccion");
        let inputimporte = $("#importe");
        let inputid_usuarios = $("#id_usuarios");
        let inputid_cachimba = $("#cachimba");
        let hayErroresdireccion = gestionarErrores(inputdireccion, errores.direccion);
        let hayErroresimporte = gestionarErrores(inputimporte, errores.importe);
        let hayErroresid_usuarios = gestionarErrores(inputid_usuarios, errores.id_usuarios);
        if (!hayErroresdireccion && !hayErroresimporte && !hayErroresid_usuarios) {

            let miXHR = objetoXHR();
            miXHR.open("POST", "../servidor/insertarPedido.php");
            miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            miXHR.send("direccion=" + inputdireccion.val() + "&" + "importe=" + inputimporte.val() + "&" + "id_usuarios=" + inputid_usuarios.val() + "&" + "cachimba=" + inputid_cachimba.val());
            let alerta = $("#alerta");
            let errorImporte = $("#importe");
            let errorDireccion = $("#direccion");
            let erroresUs = $("#id_usuarios");
            alerta.removeClass("invisible");
            errorImporte.removeClass("bg-success");
            errorDireccion.removeClass("bg-success");
            erroresUs.removeClass("bg-success");
            $("#formulario")[0].reset();

        }
        $("#modal").modal("hide");
    }
}

function gestionarErrores(input, errores) {
    var hayErrores = false;
    let divErrores = input.parent().next();
    divErrores.html("");
    input.removeClass("bg-success bg-danger");
    if (errores.length === 0) {
        input.addClass("bg-success");
    } else {
        hayErrores = true;
        input.addClass("bg-danger");
        for (let error of errores) {
            divErrores.append("<div>" + error + "</div>");
        }
    }
    return hayErrores;
}

function incluirSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

/* Validacion de Editar Cachimba con peticiones por FETCH */


function validardireccion2() {
    let direccionInput = $("#direccion").val();
    let Input = $("#direccion");
    $("#loadingdireccionnuevo").removeClass("invisible");
    let form = new FormData();
    form.append("direccion", direccionInput);

    fetch("../servidor/validarFormularioPedido.php", {
            method: 'post',
            body: form
        })
        .then(function(response) {

            return response.json()

        })
        .then(function(response) {

            gestionarErrores(Input, response.direccion)

        })
        .catch(function(err) {
            console.log(err);

        }).finally(function() {
            $("#loadingdireccionnuevo").addClass("invisible");

        });
}


function validarFormulario2(event) {
    event.preventDefault();
    let direccionInput = $("#direccion").val();
    let Input = $("#direccion");
    let usuario = $("#usuario").val()
    $("#loadingdireccionnuevo").removeClass("invisible");
    let form = new FormData();
    form.append("direccion", direccionInput);
    fetch("../servidor/validarFormularioPedido.php", {
            method: 'post',
            body: form
        })
        .then(function(response) {
            return response.json()

        })
        .then(function(response) {
            if (gestionarErrores(Input, response.direccion) === false) {
                let form2 = new FormData();

                form2.append("usuario", usuario);
                form2.append("direccion", direccionInput);
                fetch("../servidor/editarPedidosDireccion.php", {
                        method: 'post',
                        body: form2
                    }).then(function() {

                        alert("ya esta insertado");
                    })
                    .catch(function(err) {
                        console.log(err);

                    })
            }

        })
        .catch(function(err) {
            console.log(err);
        }).finally(function() {
            $("#loadingdireccionnuevo").addClass("invisible");
        });
}