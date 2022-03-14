


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

// Input Variable

document.querySelector('.button').onclick = function () {
    var password = document.querySelector('.newPassword').value,
        confirms = document.querySelector('.confPassword').value,
        email = document.querySelector('.email').value
        ;
    var emailId = document.getElementById('mail').value;
    var patternV = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    // Email Required
    if (email == "") {
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
    return true
}