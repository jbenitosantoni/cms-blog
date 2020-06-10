class AdminFunctions {
    domDelete() {
        let titleSection, tr;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "";
        tr = document.getElementById("head");
        tr.innerHTML = "";
    }
}

class DomPost {
    _id;
    _titulo;
    _imagenPequeña;
    _resumen;
    _contenido;
    _autor;
    _destacado;
    _categoria;
    _linkPost;
    _fecha;
    _comments;
    _users;

    constructor(id, titulo, imagenPequeña, resumen, contenido, autor, destacado, categoria, linkPost, fecha, comments, users) {
        this._id = id;
        this._titulo = titulo;
        this._imagenPequeña = imagenPequeña;
        this._resumen = resumen;
        this._contenido = contenido;
        this._autor = autor;
        this._destacado = destacado;
        this._categoria = categoria;
        this._linkPost = linkPost;
        this._fecha = fecha;
        this._comments = comments;
        this._users = users;
    }

    domPostsHead() {

        let titleSection, tr, thTitulo, thImagen, thResumen, thAutor, thCategoria;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "<br>Posts";
        tr = document.getElementById("head");
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
        tr.appendChild(thTitulo);
        tr.appendChild(thImagen);
        tr.appendChild(thResumen);
        tr.appendChild(thAutor);
        tr.appendChild(thCategoria);
    }
    domPosts() {
        let tBody, tr, tdTitulo, tdImagen, tdResumen, tdAutor, tdCategoria;
        tBody = document.getElementById("tBody");
        tr = document.createElement("tr");
        tdTitulo = document.createElement("td");
        tdImagen = document.createElement("td");
        tdResumen = document.createElement("td");
        tdAutor = document.createElement("td");
        tdCategoria = document.createElement("td");
        tdTitulo.innerHTML = this._autor;
        tdImagen.innerHTML = this._imagenPequeña;
        tdResumen.innerHTML = this._resumen;
        tdAutor.innerHTML = this._autor;
        tdCategoria.innerHTML = this._categoria;
        tBody.appendChild(tr);
        tr.appendChild(tdTitulo);
        tr.appendChild(tdImagen);
        tr.appendChild(tdResumen);
        tr.appendChild(tdAutor);
        tr.appendChild(tdCategoria);
    }
}

class DomComment {

    domCommentsHead() {
        let titleSection, tr, thIdComentario, thAuthor, thContent, thApproved, thidPost, thTitlePost;
        titleSection = document.getElementById("titleSection");
        titleSection.innerHTML = "<br>Comentarios";
        tr = document.getElementById("head");
        thIdComentario = document.createElement("th");
        thIdComentario.innerHTML = "ID Comentario";
        thAuthor = document.createElement("th");
        thAuthor.innerHTML = "Titulo";
        thContent = document.createElement("th");
        thContent.innerHTML = "Contenido";
        thApproved = document.createElement("th");
        thApproved.innerHTML = "Aprovado";
        thidPost = document.createElement("th");
        thidPost.innerHTML = "ID Post";
        thTitlePost = document.createElement("th");
        thTitlePost.innerHTML = "Titulo Post";
        tr.appendChild(thIdComentario);
        tr.appendChild(thTitlePost);
        tr.appendChild(thContent);
        tr.appendChild(thAuthor);
        tr.appendChild(thTitlePost);
        tr.appendChild(thidPost);
        tr.appendChild(thApproved);
    }
    domCommentDraw(idComentario, titulo, contenido, autor, tituloPost, idPost, aprobado) {
        let tbody, tr, tdIDComentario, tdTitulo, tdContenido, tdAutor, tdTituloPost, tdIdPost, tdAprobado;
        tbody = document.getElementById("tBody");
        tr = document.createElement("tr");
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