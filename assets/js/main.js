const removeEmail = (e) => {
    let email = e.target.parentNode.textContent;
    document.querySelector(`[value="${email}"]`).outerHTML = "";
    e.target.parentNode.outerHTML = "";
};
const addEmails = (e) => {

    let emails = document.getElementById("emails");
    let emailsRender = document.getElementById("emails-render");
    let form = document.getElementById("form-create");
    let input, inputs, know, div, span, arrayEmails;

    inputs = document.querySelectorAll('[name="emails[]"]') || [];
    arrayEmails = emails.value.split(",");
    arrayEmails.map((email, i) => {
        know = true;
        for (let element of inputs) {
            if (email == element.value) {
                know = false;
            }
        }
        if (know) {
            input = document.createElement("input");
            div = document.createElement("div");
            span = document.createElement("span");
            input.type = "hidden";
            input.name = "emails[]";
            input.value = email;
            form.prepend(input);
            div.classList.add("preview-email");
            div.innerHTML = email;
            div.appendChild(span);
            span.classList.add("icon-close");
            span.addEventListener("click", removeEmail)
            emailsRender.appendChild(div);
        }
    });
    emails.value = "";
};
const checkEmails = (e) => {
    e.preventDefault();
    if (document.getElementById("emails").value != "") {
        alert("Dale click al boton aceptar, para agregar los emails");
    } else {
        e.target.submit();
    }
};

const init = (e) => {
    document.getElementById("revisar-correo").addEventListener("click", addEmails)
    document.getElementById("form-create").addEventListener("submit", checkEmails)
};

window.addEventListener("load", init);