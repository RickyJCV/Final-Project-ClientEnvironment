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



function validarDireccion() {
    let inputdireccion = $("#direccion");
    incluirSpinner(inputdireccion);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticiondireccion;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("direccion=" + inputdireccion.val());
}



function validarimporte() {
    let inputimporte = $("#importe");
    incluirSpinner(inputimporte);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioPedido.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionimporte;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("color=" + inputcolor.val());
}

function validarprecio() {
    let inputprecio = $("#precio");
    incluirSpinner(inputprecio);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioCachimbas.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionprecio;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("precio=" + inputprecio.val());
}

function validarstock() {
    let inputstock = $("#stock");
    incluirSpinner(inputstock);
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioCachimbas.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionstock;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("stock=" + inputstock.val());
}

function validarFormulario() {
    event.preventDefault();
    validacionFormularioAjax();
}

function validacionFormularioAjax() {
    $("#modal").modal("show");
    let inputdireccion = $("#direccion");
    let inputmodelo = $("#modelo");
    let inputcolor = $("#color");
    let inputprecio = $("#precio");
    let inputstock = $("#stock");
    let miXHR = objetoXHR();
    miXHR.open("POST", "../servidor/validarFormularioCachimbas.php");
    miXHR.onreadystatechange = comprobarEstadoPeticionFormulario;
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.send("direccion=" + inputdireccion.val() + "&" + "modelo=" + inputmodelo.val() + "&" + "color=" + inputcolor.val() + "&" + "precio=" + inputprecio.val() + "&" + "stock=" + inputstock.val());


}


function comprobarEstadoPeticiondireccion() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputdireccion = $("#direccion");
        gestionarErrores(inputdireccion, errores.direccion);
    }
}

function comprobarEstadoPeticionmodelo() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#modelo");
        gestionarErrores(input, errores.modelo);
    }
}

function comprobarEstadoPeticioncolor() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#color");
        gestionarErrores(input, errores.color);
    }
}

function comprobarEstadoPeticionprecio() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#precio");
        gestionarErrores(input, errores.precio);
    }
}

function comprobarEstadoPeticionstock() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let input = $("#stock");
        gestionarErrores(input, errores.stock);
    }
}

function comprobarEstadoPeticionFormulario() {
    if (this.readyState == 4 && this.status == 200) {
        let errores = JSON.parse(this.responseText);
        let inputdireccion = $("#direccion");
        let inputmodelo = $("#modelo");
        let inputcolor = $("#color");
        let inputprecio = $("#precio");
        let inputstock = $("#stock");
        let hayErroresdireccion = gestionarErrores(inputdireccion, errores.direccion);
        let hayErroresmodelo = gestionarErrores(inputmodelo, errores.modelo);
        let hayErrorescolor = gestionarErrores(inputcolor, errores.color);
        let hayErroresprecio = gestionarErrores(inputprecio, errores.precio);
        let hayErroresstock = gestionarErrores(inputstock, errores.stock);
        if (!hayErroresdireccion && !hayErroresmodelo && !hayErrorescolor && !hayErroresprecio && !hayErroresstock) {

            let miXHR = objetoXHR();
            miXHR.open("POST", "../servidor/insertarCachimba.php");
            miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            miXHR.send("direccion=" + inputdireccion.val() + "&" + "modelo=" + inputmodelo.val() + "&" + "color=" + inputcolor.val() + "&" + "precio=" + inputprecio.val() + "&" + "stock=" + inputstock.val());
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
    input.parent().next().remove();
    return hayErrores;
}

function incluirSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}