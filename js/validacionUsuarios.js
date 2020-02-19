function objetoXHR() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        var versionesIE = new Array('MsXML2.XMLHTTP.5.0', 'MsXML2.XMLHTTP.4.0',
            'MsXML2.XMLHTTP.3.0', 'MsXML2.XMLHTTP', 'Microsoft.XMLHTTP');
        for (var i = 0; i < versionesIE.length; i++) {
            try {
                return new ActiveXObject(versionesIE[i]);
            } catch (errorControlado) {}
        }
    }
    throw new Error("No se pudo crear el objeto XMLHTTPRequest");
}



function validarnombre() {
    let inputnombre = $("#nombre");
    let loading = $("#loading");
    loading.removeClass("invisible");
    incluirSpinner(inputnombre);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioUsuarios.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionnombre;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("nombre=" + inputnombre.val());
}

function validarapellidos() {
    let inputapellidos = $("#apellidos");
    let loading = $("#loading2");
    loading.removeClass("invisible");
    incluirSpinner(inputapellidos);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioUsuarios.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionapellidos;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("apellidos=" + inputapellidos.val());
}

function validaremail() {
    let inputemail = $("#email");
    let loading = $("#loading3");
    loading.removeClass("invisible");
    incluirSpinner(inputemail);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioUsuarios.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionemail;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("email=" + inputemail.val());
}

function validarpassword() {
    let inputpassword = $("#password");
    let loading = $("#loading4");
    loading.removeClass("invisible");
    incluirSpinner(inputpassword);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioUsuarios.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionpassword;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("password=" + inputpassword.val());
}


function validarFormulario() {
    event.preventDefault();
    validacionFormularioAjax();
}

function validacionFormularioAjax() {
    $("#modal").modal("show");
    let inputnombre = $("#nombre");
    let inputapellidos = $("#apellidos");
    let inputpassword = $("#password");
    let inputemail = $("#email");
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioUsuarios.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionFormulario;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("nombre=" + inputnombre.val() + "&" + "apellidos=" + inputapellidos.val() + "&" + "password=" + inputpassword.val() + "&" + "email=" + inputemail.val());


}


function comprobarEstadoPeticionnombre() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputnombre = $("#nombre");
        gestionarErrores(inputnombre, errores.nombre);
        let loading = $("#loading");
        loading.addClass("invisible");
    }
}

function comprobarEstadoPeticionapellidos() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#apellidos");
        gestionarErrores(input, errores.apellidos);
        let loading = $("#loading2");
        loading.addClass("invisible");
    }
}

function comprobarEstadoPeticionemail() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputemail = $("#email");
        gestionarErrores(inputemail, errores.email);
        let loading = $("#loading3");
        loading.addClass("invisible");
    }
}

function comprobarEstadoPeticionpassword() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#password");
        gestionarErrores(input, errores.password);
        let loading = $("#loading4");
        loading.addClass("invisible");
    }
}


function comprobarEstadoPeticionFormulario() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputnombre = $("#nombre");
        let inputapellidos = $("#apellidos");
        let inputpassword = $("#password");
        let inputemail = $("#email");
        let hayErroresnombre = gestionarErrores(inputnombre, errores.nombre);
        let hayErroresapellidos = gestionarErrores(inputapellidos, errores.apellidos);
        let hayErrorespassword = gestionarErrores(inputpassword, errores.password);
        let hayErroresemail = gestionarErrores(inputemail, errores.email);
        if (!hayErroresnombre && !hayErroresapellidos && !hayErrorespassword && !hayErroresemail) {

            let miXHR = objetoXHR();
            miXHR.open("POST", "../servidor/insertarUsuarios.php");
            miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            miXHR.send("nombre=" + inputnombre.val() + "&" + "apellidos=" + inputapellidos.val() + "&" + "password=" + inputpassword.val() + "&" + "email=" + inputemail.val());
            let formulario = $("#formulario");
            formulario.submit();
        }
        $("#modal").modal("hide");
    }
}

function gestionarErrores(input, errores) {
    var hayErrores = false;
    let divErrores = input.next();
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
    //input.parent().next().remove();
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


function validaremail2() {
    let emailInput = $("#email").val();
    let Input = $("#email");
    $("#loadingemailnuevo").removeClass("invisible");
    let form = new FormData();
    form.append("email", emailInput);

    fetch("../servidor/validarFormularioUsuarios.php", {
            method: 'post',
            body: form
        })
        .then(function(response) {

            return response.json()

        })
        .then(function(response) {

            gestionarErrores(Input, response.email)

        })
        .catch(function(err) {
            console.log(err);

        }).finally(function() {
            $("#loadingemailnuevo").addClass("invisible");

        });
}


function validarFormulario2(event) {
    event.preventDefault();
    let emailInput = $("#email").val();
    let Input = $("#email");
    let usuario = $("#usuario").val()
    $("#loadingpemailnuevo").removeClass("invisible");
    let form = new FormData();
    form.append("email", emailInput);
    fetch("../servidor/validarFormularioUsuarios.php", {
            method: 'post',
            body: form
        })
        .then(function(response) {
            return response.json()

        })
        .then(function(response) {
            if (gestionarErrores(Input, response.email) === false) {
                let form2 = new FormData();

                form2.append("usuario", usuario);
                form2.append("email", emailInput);
                fetch("../servidor/editarUsuariosEmail.php", {
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
            $("#loadingpemailnuevo").addClass("invisible");
        });
}