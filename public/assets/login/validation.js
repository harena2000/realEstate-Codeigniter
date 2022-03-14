function isInputNumber(evt) {

    var ch = String.fromCharCode(evt.which);

    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }

}
var cleave = new Cleave('.contact', {
    phone: true,
    phoneRegionCode: 'MG'
});


// <!-- GESTION D'ERREUR EN JS -->
// Email Validation
function emailValidation() {
    var form = document.getElementById('form');
    var email = document.getElementById('mail').value;
    var emailB = document.getElementById('mail');
    var stat = document.getElementById('stat');

    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (email.match(pattern)) {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        stat.innerHTML = "";
        emailB.style.borderColor = "#00ff00";
        stat.style.Color = "#00ff00";
    } else {
        form.classList.remove("Invalid");
        form.classList.add("Valid");
        stat.innerHTML = "Not in a valid format";
        emailB.style.borderColor = "#ff0000";
        stat.style.Color = "#ff0000";
    }

}

// Password Validation
function passwordValidation() {
    var form = document.getElementById('form');
    var newPass = document.getElementById('password-field').value;
    var newBorder = document.getElementById('password-field');
    var textNew = document.getElementById('textN');

    if (newPass.length >= 6) {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        newBorder.style.borderColor = "#00ff00";
        textNew.innerHTML = "Your Password is Strength";
        textNew.style.Color = "#00ff00";
    }
    else if (newPass.length < 6) {
        form.classList.remove("Invalid");
        form.classList.add("Valid");
        newBorder.style.borderColor = "#ff0000";
        textNew.innerHTML = "Put a Longer password (more than 6 character)";
        textNew.style.Color = "#ff0000";
    }
}

function passwordConfirm() {
    var form = document.getElementById('form');
    var newPass = document.getElementById('password-field').value;
    var confPass = document.getElementById('confPassword').value;
    var confBorder = document.getElementById('confPassword');
    var textConf = document.getElementById('textC');

    if (confPass == newPass) {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        confBorder.style.borderColor = "#00ff00";
        textConf.innerHTML = "Your password is the same";
        textConf.style.Color = "#00ff00";
    }
    else {
        form.classList.remove("Invalid");
        form.classList.add("Valid");
        confBorder.style.borderColor = "#ff0000";
        textConf.innerHTML = "Incorrect Password";
        textConf.style.Color = "#ff0000";
    }

}

function codeConfirmation() {
    var form = document.getElementById('form');
    var newPass = document.getElementById('codeConf').value;
    var newBorder = document.getElementById('codeConf');
    var textNew = document.getElementById('textCode');

    if (newPass.length == 4) {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        newBorder.style.borderColor = "#00ff00";
        textNew.innerHTML = "Confirmation code OK";
        textNew.style.Color = "#00ff00";
    }
    else if (newPass.length < 4) {
        form.classList.remove("Invalid");
        form.classList.add("Valid");
        newBorder.style.borderColor = "#ff0000";
        textNew.innerHTML = "4 Number is require";
        textNew.style.Color = "#ff0000";
    }
}

// Input Variable

document.querySelector('.button').onclick = function () {
    var password = document.querySelector('.newPassword').value,
        confirms = document.querySelector('.confPassword').value,
        name = document.querySelector('.name').value,
        sexe = document.querySelector('.sexe').value,
        adresse = document.querySelector('.adresse').value,
        ville = document.querySelector('.ville').value,
        pays = document.querySelector('.pays').value,
        profession = document.querySelector('.profession').value,
        lieuNaissance = document.querySelector('.lieuNaissance').value,
        dateNaissance = document.querySelector('.dateNaissance').value,
        status = document.querySelector('.status').value,
        contact = document.querySelector('.contact').value,
        email = document.querySelector('.email').value
        codeConfirm = document.querySelector('codeConf')
        ;
    var emailId = document.getElementById('mail').value;
    var patternV = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    // Name Validation
    if (name == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your name/family name is required')
        });
        return false
    }

    // Sexe Validation
    else if (sexe == "empty") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Please, Choose your gender')
        });
        return false
    }

    // LieuNaissance Validation
    else if (lieuNaissance == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Please, Answer to the question. From where you are born ?')
        });
        return false
    }

    // DateNaissance Validation
    else if (dateNaissance == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Birthday input cannot be empty')
        });
        return false
    }

    // Adresse Validation
    else if (adresse == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your Home adresse is required')
        });
        return false
    }

    // Ville Validation
    else if (ville == "empty") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your City is required')
        });
        return false
    }

    // Pays Validation
    else if (pays == "empty") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your Nation is required')
        });
        return false
    }

    // Profession Validation
    else if (profession == "empty") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your Profession is required')
        });
        return false
    }

    // Status Validation
    else if (status == "empty") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Please, Choose your Marital status')
        });
        return false
    }

    // Contact Validation empty
    else if (contact == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Please, Put your phone number')
        });
        return false
    }
    // Contact Validation Length
    else if (contact.length != 13) {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Check your phone number ')
        });
        return false
    }

    // Email Required
    else if (email == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your email adresse is required')
        });
        return false
    }
    else if (!emailId.match(patternV)) {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Your email adresse is Invalid')
        });
        return false
    }

    // Password Validation messages of length
    else if (password == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('A Strength password is required')
        });
        return false
    }
    else if (password.length < 6) {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Please put a Longer password')
        });
        return false
    }
    // Confirm Password Required
    else if (confirms == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Confirm the password')
        });
        return false
    }
    // Password verification matches
    else if (password != confirms) {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Check your confirmation password')
        });
        return false
    }
    else if (codeConfirm == "") {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Confirmation Code is require')
        });
        return false
    }
    // Password verification matches
    else if (codeConfirm < 4) {
        $(document).ready(function () {
            alertify.set('notifier', 'position', 'top-right')
            alertify.warning('Enter the require format')
        });
        return false
    }
    return true
}