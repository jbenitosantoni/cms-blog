class Post {
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


    constructor(id, titulo, imagenPequeña, resumen, contenido, autor, destacado, categoria, linkPost, fecha, comments) {
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
    }

    get comments() {
        return this._comments;
    }

    get id() {
        return this._id;
    }

    get titulo() {
        return this._titulo;
    }

    get imagenPequeña() {
        return this._imagenPequeña;
    }

    get resumen() {
        return this._resumen;
    }

    get contenido() {
        return this._contenido;
    }

    get autor() {
        return this._autor;
    }

    get destacado() {
        return this._destacado;
    }

    get categoria() {
        return this._categoria;
    }

    get linkPost() {
        return this._linkPost;
    }

    get fecha() {
        return this._fecha;
    }
}

class createDOM extends Post {
    constructor(id, titulo, imagenPequeña, resumen, contenido, autor, destacado, categoria, linkPost, fecha, comments) {
        super(id, titulo, imagenPequeña, resumen, contenido, autor, destacado, categoria, linkPost, fecha, comments);
        if (this.destacado == true) {
            this.createDestacado();
        }
        if (this.destacado == false) {
            this.createPost();
        }
        this.dibujarPostHTML();
    }

    createDestacado() {
        let div1, div2, div3, div4, strong, h3, a, div5, p, a2, img;
        div1 = document.getElementById("destacados");
        div2 = document.createElement("div");
        div2.setAttribute("class", "col-md-6");
        div3 = document.createElement("div");
        div3.setAttribute("class", "card flex-md-row mb-4 box-shadow h-md-250");
        div4 = document.createElement("div");
        div4.setAttribute("class", "card-body d-flex flex-column align-items-start");
        strong = document.createElement("strong");
        strong.setAttribute("class", "d-inline-block mb-2 text-primary");
        strong.innerHTML = this.categoria;
        h3 = document.createElement("h3");
        h3.setAttribute("class", "mb-0");
        a = document.createElement("a");
        a.setAttribute("class", "text-dark");
        a.setAttribute("href", this.linkPost);
        h3.appendChild(a);
        div5 = document.createElement("div");
        div5.setAttribute("class", "mb-1 text-muted");
        div5.innerHTML = this.fecha;
        p = document.createElement("p");
        p.setAttribute("class", "card-text mb-auto");
        p.innerHTML = this.resumen;
        a2 = document.createElement("a");
        a2.setAttribute("href", "post.php?id=" + this.id);
        a2.innerHTML = "Continuar leyendo";
        img = document.createElement("img");
        img.setAttribute("class", "card-img-right flex-auto d-none d-md-block");
        img.setAttribute("src", "assets/img/200x250.jpg");
        div4.appendChild(strong);
        h3.appendChild(a);
        div4.appendChild(h3);
        div4.appendChild(div5);
        div4.appendChild(p);
        div4.appendChild(a2);
        div3.appendChild(div4);
        div3.appendChild(img);
        div2.appendChild(div3);
        div1.appendChild(div2);
    }

    createPost() {
        let divBox, div1, div2, div3, img, div4, p, div5, button1, small;
        div1 = document.getElementById("posts");
        divBox = document.createElement("div");
        divBox.setAttribute("class", "col-md-4");
        div2 = document.createElement("div");
        div2.setAttribute("class", "card mb-4 box-shadow");
        img = document.createElement("img");
        img.setAttribute("class", "card-img-top");
        img.setAttribute("src", this.imagenPequeña);
        div3 = document.createElement("div");
        div3.setAttribute("class", "card-body");
        p = document.createElement("p");
        p.setAttribute("class", "card-text");
        p.innerHTML = this.resumen;
        div4 = document.createElement("div");
        div4.setAttribute("class", "d-flex justify-content-between align-items-center");
        div5 = document.createElement("div");
        div5.setAttribute("class", "btn-group");
        button1 = document.createElement("button");
        button1.setAttribute("class", "btn btn-sm btn-outline-secondary");
        button1.setAttribute("data-toggle", "modal");
        button1.setAttribute("data-target", ".modal" + this.id);
        button1.innerHTML = "View";
        div5.appendChild(button1);
        div4.appendChild(div5);
        small = document.createElement("small");
        small.setAttribute("class", "text-muted");
        small.innerHTML = this.fecha;
        div4.appendChild(small);
        div3.appendChild(p);
        div3.appendChild(div4);
        div2.appendChild(img);
        div2.appendChild(div3);
        divBox.appendChild(div2);
        div1.appendChild(divBox);
    }

    dibujarPostHTML() {
        let div0, div1, div2, div3,aButtonVerMAs, buttonVerMas, p, divheader, h3, button, span, divbody, pAutorPost, pComentario, form, formlabelCommentTitle, forminputCommentTitle, formlabelCommentContent, forminputCommentContent, formlabelCommentAuthor, forminputCommentAuthor, forminputButtom, forminputID,  div4, div5, div6, div7, h5Form;
        let comentariosFormateados = "";
        let countComentarios = 0;
        let titulo = "";
        pComentario = document.createElement("div");
        if (this.comments.length >= 1) {
            for (let i = 0; i < this.comments.length; i++) {
                comentariosFormateados = comentariosFormateados +this.comments[i].title + "<br>" + this.comments[i].content + "<br>" + this.comments[i].author + "<br><br>";
                countComentarios ++;
                titulo = "<h5>Comentarios (" + countComentarios +")</h5>"
            }
            pComentario.innerHTML = titulo + comentariosFormateados;
            comentariosFormateados = "";
            countComentarios = 0;
        }

        div0 = document.getElementById("modalContainer");
        div1 = document.createElement("div");
        div1.setAttribute("class", "modal fade modal" + this.id);
        div1.setAttribute("tabindex", "-1");
        div1.setAttribute("role", "dialog");
        div1.setAttribute("aria-labelledby", "myLargeModalLabel");
        div1.setAttribute("aria-hidden", "true");
        div1.setAttribute("id", "myModal");
        div2 = document.createElement("div");
        div2.setAttribute("class", "modal-dialog modal-lg");
        div3 = document.createElement("div");
        div3.setAttribute("class", "modal-content");
        p = document.createElement("p");
        p.innerHTML = this.contenido;
        pAutorPost = document.createElement("p");
        pAutorPost.innerHTML = "Autor: " + this.autor;
        divbody = document.createElement("div");
        divbody.setAttribute("class", "modal-body");
        divheader = document.createElement("div");
        divheader.setAttribute("class", "modal-header");
        h3 = document.createElement("h3");
        h3.setAttribute("class", "modal-title");
        h3.innerHTML = this.titulo;
        buttonVerMas = document.createElement("button");
        buttonVerMas.innerHTML = "Ver Mas";
        aButtonVerMAs = document.createElement("a");
        aButtonVerMAs.setAttribute("href", "post.php?id=" + this.id);
        aButtonVerMAs.appendChild(buttonVerMas);
        button = document.createElement("button");
        button.setAttribute("type", "button");
        button.setAttribute("class", "close");
        button.setAttribute("data-dismiss", "modal");
        button.setAttribute("aria-label", "Close");
        span = document.createElement("span");
        span.setAttribute("aria-hidden", "true");
        span.innerHTML = "&times;";
        div4 = document.createElement("div");
        h5Form = document.createElement("h5");
        h5Form.innerHTML = "Nuevo Comentario";
        form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("name", "formComment");

        formlabelCommentTitle = document.createElement("label");
        formlabelCommentTitle.setAttribute("for", "forminputCommentTitle");
        formlabelCommentTitle.innerHTML = "Titulo*";
        forminputCommentTitle = document.createElement("input");
        forminputCommentTitle.setAttribute("type", "text");
        forminputCommentTitle.setAttribute("name", "forminputCommentTitle");
        forminputCommentTitle.setAttribute("id", "forminputCommentTitle");
        forminputCommentTitle.setAttribute("required", "");
        div4.appendChild(formlabelCommentTitle);

        div5 = document.createElement("div");
        formlabelCommentContent = document.createElement("label");
        formlabelCommentContent.setAttribute("for", "forminputCommentContent");
        formlabelCommentContent.innerHTML = "Comentario*";
        forminputCommentContent = document.createElement("textarea");
        forminputCommentContent.setAttribute("name", "forminputCommentContent");
        forminputCommentContent.setAttribute("id", "forminputCommentContent");
        forminputCommentContent.setAttribute("rows", "10");
        forminputCommentContent.setAttribute("cols", "50");
        forminputCommentContent.setAttribute("required", "");
        div5.appendChild(formlabelCommentContent);

        div6 = document.createElement("div");
        formlabelCommentAuthor = document.createElement("label");
        formlabelCommentAuthor.setAttribute("for", "forminputCommentAuthor");
        formlabelCommentAuthor.innerHTML = "Autor*";
        forminputCommentAuthor = document.createElement("input");
        forminputCommentAuthor.setAttribute("type", "text");
        forminputCommentAuthor.setAttribute("name", "forminputCommentAuthor");
        forminputCommentAuthor.setAttribute("id", "forminputCommentAuthor");
        forminputCommentAuthor.setAttribute("required", "");
        div6.appendChild(formlabelCommentAuthor);

        forminputID = document.createElement("input");
        forminputID.setAttribute("type", "hidden");
        forminputID.setAttribute("name", "forminputID");
        forminputID.setAttribute("value", this.id);

        div7 = document.createElement("div");
        forminputButtom = document.createElement("input");
        forminputButtom.setAttribute("type", "submit");
        forminputButtom.setAttribute("vale", "Post");
        div7.appendChild(forminputButtom);

        button.appendChild(span);
        divheader.appendChild(h3);
        divheader.appendChild(button);
        div3.appendChild(divheader);
        divbody.appendChild(p);
        divbody.appendChild(pAutorPost);
        divbody.appendChild(aButtonVerMAs);
        divbody.appendChild(pComentario);
        divbody.appendChild(h5Form);
        form.appendChild(div4);
        form.appendChild(forminputCommentTitle);
        form.appendChild(forminputID);
        form.appendChild(div5);
        form.appendChild(forminputCommentContent);
        form.appendChild(div6);
        form.appendChild(forminputCommentAuthor);
        form.appendChild(div7);
        divbody.appendChild(form);
        div3.appendChild(divbody);
        div2.appendChild(div3);
        div1.appendChild(div2);
        div0.appendChild(div1);
    }
}