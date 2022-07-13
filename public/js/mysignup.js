function checkName(event) {
    const input = event.currentTarget;
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.parentNode.classList.add('errorj');
    }
    checkForm();
}

function jsonCheckUsername(json) {
    if (formStatus.username = !json.exists) {//se non esiste, cioè non ho record identici nella tabella
        document.querySelector('.username').classList.remove('errorj');
    } else {
        document.querySelector('.username span').textContent = "Username già in uso";
        document.querySelector('.username').classList.add('errorj');
    }
    checkForm();
}

function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
    checkForm();
}

function fetchResponse(response) {
    if (!response.ok) 
        return null;

    return response.json();
}

function checkUsername(event) {
    const input = event.currentTarget;

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {//test return a boolean
        input.parentNode.parentNode.querySelector('span').textContent = "Puoi usare lettere, numeri e '_' per un massimo di 15 caratteri";
        input.parentNode.parentNode.classList.add('errorj');
        formStatus.username = false;
        checkForm();
    } else {
        fetch("register_username/"+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const input = event.currentTarget;
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;
        checkForm();
    } else {
        fetch("register_email/"+encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkPassword(event) {
    const passwordInput = event.currentTarget;

    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }
    checkForm();
}

function checkConfirmPassword(event) {
    const confirmPasswordInput = event.currentTarget;
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
    checkForm();
}


function checkForm() {
    document.getElementById('submit').disabled = !document.querySelector('.allow input').checked        || 
            Object.keys(formStatus).length !== 7      || 
            Object.values(formStatus).includes(false);
}

const formStatus = { 'upload' : true };
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.querySelector('.allow input').addEventListener('change', checkForm);

if (document.querySelector('.error') !== null) {//vedi RegisterControler
    checkUsername(); 
    checkPassword(); 
    checkConfirmPassword(); 
    checkEmail();
    document.querySelector('.name input').dispatchEvent(new Event('blur'));
    document.querySelector('.surname input').dispatchEvent(new Event('blur'));
}