class AdminFunctions {
    domDelete() {
        let titleSection, head, body;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "";
        head = document.getElementById("head");
        head.innerHTML = "";
        body = document.getElementById("tBody");
        body.innerHTML = "";
    }
}

class DomPost {

    domPostsHead() {

        let titleSection, tr, thId, thTitulo, thImagen, thResumen, thAutor, thCategoria, thEditar;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "<br>Posts";
        tr = document.getElementById("head");
        thId = document.createElement("th");
        thId.innerHTML = "ID Post";
        thTitulo = document.createElement("th");
        thTitulo.innerHTML = "Titulo";
        thImagen = document.createElement("th");
        thImagen.innerHTML = "Imagen";
        thResumen = document.createElement("th");
        thResumen.innerHTML = "Resumen";
        thAutor = document.createElement("th");
        thAutor.innerHTML = "Autor";
        thCategoria = document.createElement("th");
        thCategoria.innerHTML = "Categoria";
        thEditar = document.createElement("th");
        thEditar.innerHTML = "Editar";
        tr.appendChild(thId);
        tr.appendChild(thTitulo);
        tr.appendChild(thImagen);
        tr.appendChild(thResumen);
        tr.appendChild(thAutor);
        tr.appendChild(thCategoria);
        tr.appendChild(thEditar);
    }
    domPosts(id, titulo, imagen, resumen, contendio, autor, destacado, categoria, linkPost, fecha, idUsuarioCreador) {
        let div0, div1, div2, div3, tdId, tBody, tr, tdTitulo, tdImagen, tdResumen, tdAutor, tdCategoria, button, divbody, divheader, h3, h5titulo, h5imagen, h5resumen, h5contendio, h5autor, h5destacado, h5categoria, h5linkPost, h5fecha, form, inputid, inputtitulo, inputimagen, inputresumen, inputcontenido, inputautor, inputdestacado, inputcategoria, inputlinkPost, inputfecha, option1, option2, submitForm, divSeparar;
        tBody = document.getElementById("tBody");
        tr = document.createElement("tr");
        tdId = document.createElement("td");
        tdTitulo = document.createElement("td");
        tdImagen = document.createElement("td");
        tdResumen = document.createElement("td");
        tdAutor = document.createElement("td");
        tdCategoria = document.createElement("td");
        button = document.createElement("button");
        button.setAttribute("data-toggle", "modal");
        button.setAttribute("data-target", ".modal" + id);
        button.setAttribute("class", "btn btn-sm btn-outline-secondary");
        button.innerHTML = "Editar";
        tdId.innerHTML = id;
        tdTitulo.innerHTML = titulo;
        tdImagen.innerHTML = imagen;
        tdResumen.innerHTML = resumen;
        tdAutor.innerHTML = autor;
        tdCategoria.innerHTML = categoria;
        tr.appendChild(tdId);
        tr.appendChild(tdTitulo);
        tr.appendChild(tdImagen);
        tr.appendChild(tdResumen);
        tr.appendChild(tdAutor);
        tr.appendChild(tdCategoria);
        tr.appendChild(button);
        tBody.appendChild(tr);
        div0 = document.createElement("container");
        div1 = document.createElement("div");
        div1.setAttribute("class", "modal fade modal" + id);
        div1.setAttribute("tabindex", "-1");
        div1.setAttribute("role", "dialog");
        div1.setAttribute("aria-labelledby", "myLargeModalLabel");
        div1.setAttribute("aria-hidden", "true");
        div1.setAttribute("id", "myModal");
        div2 = document.createElement("div");
        div2.setAttribute("class", "modal-dialog modal-lg");
        div3 = document.createElement("div");
        div3.setAttribute("class", "modal-content");
        divbody = document.createElement("div");
        divbody.setAttribute("class", "modal-body");
        divheader = document.createElement("div");
        divheader.setAttribute("class", "modal-header");
        h3 = document.createElement("h3");
        h3.setAttribute("class", "modal-title");
        h3.innerHTML = "Editar Post: " + id;
        form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "");
        inputid = document.createElement("input");
        inputid.setAttribute("type", "hidden");
        inputid.setAttribute("value", id);
        inputid.setAttribute("name", "idpost");
        inputtitulo = document.createElement("input");
        inputtitulo.setAttribute("type", "text");
        inputtitulo.setAttribute("name", "inputtitulo");
        inputtitulo.setAttribute("value", titulo);
        inputimagen = document.createElement("input");
        inputimagen.setAttribute("type", "text");
        inputimagen.setAttribute("name", "inputimagen")
        inputimagen.setAttribute("value", imagen);
        inputresumen = document.createElement("textarea");
        inputresumen.setAttribute("rows", "4");
        inputresumen.setAttribute("cols", "50");
        inputresumen.setAttribute("name", "inputresumen");
        inputresumen.innerHTML = resumen;
        inputcontenido = document.createElement("textarea");
        inputcontenido.setAttribute("rows", "10");
        inputcontenido.setAttribute("cols", "70");
        inputcontenido.setAttribute("name", "inputcontenido");
        inputcontenido.innerHTML = contendio;
        inputautor = document.createElement("input");
        inputautor.setAttribute("type", "text");
        inputautor.setAttribute("name", "inputautor");
        inputautor.setAttribute("value", autor);
        inputdestacado = document.createElement("select");
        inputdestacado.setAttribute("name", "inputdestacado");
        inputdestacado.setAttribute("value", destacado);
        option1 = document.createElement("option");
        option1.setAttribute("value", "1");
        option1.innerHTML = "Si";
        inputdestacado.appendChild(option1);
        option2 = document.createElement("option");
        option2.setAttribute("value", "2");
        option2.innerHTML = "No";
        inputdestacado.appendChild(option2);
        inputcategoria = document.createElement("input");
        inputcategoria.setAttribute("type", "text");
        inputcategoria.setAttribute("name", "inputcategoria");
        inputcategoria.setAttribute("value", categoria);
        inputlinkPost = document.createElement("input");
        inputlinkPost.setAttribute("type", "text");
        inputlinkPost.setAttribute("name", "inputlinkpost");
        inputlinkPost.setAttribute("value", linkPost);
        inputfecha = document.createElement("input");
        inputfecha.setAttribute("type", "text");
        inputfecha.setAttribute("name", "inputfecha");
        inputfecha.setAttribute("value", fecha);
        h5titulo = document.createElement("h5");
        h5imagen = document.createElement("h5");
        h5resumen = document.createElement("h5");
        h5contendio = document.createElement("h5");
        h5autor = document.createElement("h5");
        h5destacado = document.createElement("h5");
        h5categoria = document.createElement("h5");
        h5linkPost = document.createElement("h5");
        h5fecha = document.createElement("h5");
        h5titulo.innerHTML = "Titulo:";
        h5imagen.innerHTML = "Imagen:";
        h5resumen.innerHTML = "Resumen:";
        h5contendio.innerHTML = "Contenido:";
        h5autor.innerHTML = "Autor:";
        h5destacado.innerHTML = "Destacado:";
        h5categoria.innerHTML = "Categoria:";
        h5linkPost.innerHTML = "Link Post:";
        h5fecha.innerHTML = "Fecha:";
        divSeparar = document.createElement("div");
        submitForm = document.createElement("input");
        submitForm.setAttribute("type", "submit");
        submitForm.setAttribute("value", "Editar");
        divSeparar.appendChild(submitForm);
        form.appendChild(h5titulo);
        form.appendChild(inputtitulo);
        form.appendChild(h5imagen);
        form.appendChild(inputimagen);
        form.appendChild(h5resumen);
        form.appendChild(inputresumen);
        form.appendChild(h5contendio);
        form.appendChild(inputcontenido);
        form.appendChild(h5contendio);
        form.appendChild(inputcontenido);
        form.appendChild(h5autor);
        form.appendChild(inputautor);
        form.appendChild(h5destacado);
        form.appendChild(inputdestacado);
        form.appendChild(h5categoria);
        form.appendChild(inputcategoria);
        form.appendChild(h5linkPost);
        form.appendChild(inputlinkPost);
        form.appendChild(h5fecha);
        form.appendChild(inputfecha);
        form.appendChild(divSeparar);
        divbody.appendChild(form);
        divheader.appendChild(h3);
        div3.appendChild(divheader);
        div3.appendChild(divbody);
        div2.appendChild(div3);
        div1.appendChild(div2);
        div0.appendChild(div1);
        tBody.appendChild(div0);
    }
}

class DomComment {

    domCommentsHead() {
        let titleSection, tr, thIdComentario, thTitulo, thAuthor, thContent, thApproved, thidPost, thTitlePost, thAprobar;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "<br>Comentarios";
        tr = document.getElementById("head");
        thIdComentario = document.createElement("th");
        thIdComentario.innerHTML = "ID Comentario";
        thTitulo = document.createElement("th");
        thTitulo.innerHTML = "Títutlo";
        thAuthor = document.createElement("th");
        thAuthor.innerHTML = "Autor";
        thContent = document.createElement("th");
        thContent.innerHTML = "Contenido";
        thApproved = document.createElement("th");
        thApproved.innerHTML = "Aprovado";
        thidPost = document.createElement("th");
        thidPost.innerHTML = "ID Post";
        thTitlePost = document.createElement("th");
        thTitlePost.innerHTML = "Titulo Post";
        thAprobar = document.createElement("th");
        thAprobar.innerHTML = "¿Aprobar?";
        tr.appendChild(thIdComentario);
        tr.appendChild(thTitulo);
        tr.appendChild(thContent);
        tr.appendChild(thAuthor);
        tr.appendChild(thTitlePost);
        tr.appendChild(thidPost);
        tr.appendChild(thApproved);
        tr.appendChild(thAprobar);
    }
    domCommentDraw(idComentario, titulo, contenido, autor, tituloPost, idPost, aprobado) {
        let tbody, tr, tdIDComentario, tdTitulo, tdContenido, tdAutor, tdTituloPost, tdIdPost, tdAprobado, input, thYaAprovado, tdform, form, inputTextOculto;
        if (aprobado == 1) {
            aprobado = "Si";
            thYaAprovado = document.createElement("td");
            thYaAprovado.innerHTML = "Ya está aprobado";
        } else {
            aprobado = "No";
            tdform = document.createElement("td")
            form = document.createElement("form");
            form.setAttribute("method", "post");
            input = document.createElement("input");
            input.setAttribute("type", "submit");
            input.setAttribute("value", "Aprobar");
            input.setAttribute("class", "btn btn-sm btn-outline-secondary");
            inputTextOculto = document.createElement("input");
            inputTextOculto.setAttribute("type", "text");
            inputTextOculto.setAttribute("name", "idComment");
            inputTextOculto.setAttribute("value", idComentario);
            inputTextOculto.setAttribute("style", "display: none");
            form.appendChild(inputTextOculto);
            form.appendChild(input);
            tdform.appendChild(form);
        }
        tbody = document.getElementById("tBody");
        tr = document.createElement("tr");
        tr.setAttribute("id", idComentario);
        tdIDComentario = document.createElement("td");
        tdIDComentario.innerHTML = idComentario;
        tdTitulo = document.createElement("td");
        tdTitulo.innerHTML = titulo;
        tdContenido = document.createElement("td");
        tdContenido.innerHTML = contenido;
        tdAutor = document.createElement("td");
        tdAutor.innerHTML = autor;
        tdTituloPost = document.createElement("td");
        tdTituloPost.innerHTML = tituloPost;
        tdIdPost = document.createElement("td");
        tdIdPost.innerHTML = idPost;
        tdAprobado = document.createElement("td");
        tdAprobado.innerHTML = aprobado;
        tbody.appendChild(tr);
        tr.appendChild(tdIDComentario);
        tr.appendChild(tdTitulo);
        tr.appendChild(tdContenido);
        tr.appendChild(tdAutor);
        tr.appendChild(tdTituloPost);
        tr.appendChild(tdIdPost);
        tr.appendChild(tdAprobado);
        if (aprobado == "Si") {
            tr.appendChild(thYaAprovado);
        }
        if (aprobado == "No") {
            tr.appendChild(tdform);
        }
    }
}

class DomUsers {
    domUsersHead() {
        let titleSection, tr, thID, thName, themail;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "<br>Usuarios";
        tr = document.getElementById("head");
        thID = document.createElement("th");
        thID.innerHTML = "ID";
        thName = document.createElement("th");
        thName.innerHTML = "Nombre";
        themail = document.createElement("th");
        themail.innerHTML = "Email";
        tr.appendChild(thID);
        tr.appendChild(thName);
        tr.appendChild(themail);
    }
}