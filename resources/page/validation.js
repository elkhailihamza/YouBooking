function payment() {
    var name = document.forms["Forms"]["name"];
    var email = document.forms["Forms"]["email"];
    var password = document.forms["Forms"]["password"];
    var confirmPassword = document.forms["Forms"]["conf-password"];

    if (!/^[a-zA-Z]{3,30}$/.test(name.value.trim())) {
        alert("Veuillez entrer un nom valide.");
        name.focus();
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        alert("Veuillez entrer une adresse e-mail valide.");
        email.focus();
        return false;
    }

    if (!/^[a-zA-Z]+\.[0-9]+$/.test(password.value.trim())) {
        alert("Veuillez entrer un mot de passe valide.");
        password.focus();
        return false;
    }

    if (!/^\d{1,2}\.\d{1,2}$/.test(confirmPassword.value.trim())) {
        alert("Veuillez entrer une confirmation de mot de passe valide.");
        confirmPassword.focus();
        return false;
    }

    return true;
}

 