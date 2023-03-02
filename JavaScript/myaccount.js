/*----------------------------------------------------------------
    Name: Vy Tran, Teresa Vu
    Date:  Dec 4, 2022
    Section: CST8285_301
    File name: myaccount.js
    This is the my account validation for the login and registration form. 
------------------------------------------------------------------*/

let loginError = document.getElementById('loginError');
let passError = document.getElementById('passError');
//let registerError = document.getElementById('registerError');

let loginInput = document.getElementById('login');
let passwordInput = document.getElementById('password');
//let registerInput = document.getElementById('email');

//define global variables for error messages
let defaultMsg = "";
let loginErrorMsg ="x Enter a valid email address";
let passErrorMsg = "x Eassword should be at least 6 characters: 1 uppercase, 1 lowercase.";
//let registerErrorMsg = "Enter a valid email address. Email address should have the format abc@abc.xyz";

/*-----------------------------------------------------------------------
The function validates the email address for registration form
------------------------------------------------------------------------*/
//emailInput.addEventListener('keyup',validateEmail);
function validateRegistration(){
    let email = registerInput.value;
    let regexp = /\S+@\S+\.\S+/;
    if (regexp.test(email)){
        registerError.innerHTML = defaultMsg;
        return false;
    }else {
    registerError.innerHTML = registerErrorMsg;
    return true;
    }
}

/*-----------------------------------------------------------------------
The function validates the password
------------------------------------------------------------------------*/
function validatePassword(){
    let password = passwordInput.value;
    let regexp1=/^(?=[^A-Z]*[A-Z])(?=[^a-z]*[a-z]).{6,}$/; 
    if (password.match(regexp1)){ //check if the entered password matches the regexp
        passError.innerHTML = defaultMsg;
        return true;
    }else {
        passError.innerHTML = passErrorMsg;
        return false;
    } 
}

function validateLogin(){
    let login = loginInput.value;
    let regexp2 = /\S+@\S+\.\S+/;
    if (regexp2.test(login)){
        loginError.innerHTML = defaultMsg;
        return false
    }else{
    loginError.innerHTML = loginErrorMsg;
    return true;
    }
}

/*-----------------------------------------------------------------------
on submit method
------------------------------------------------------------------------*/
function validate(){
    let valid = true;
    if (validateLogin()){
        loginError.innerHTML = loginErrorMsg;
        valid = false;
        }if (!validatePassword()){
            passError.innerHTML=passErrorMsg;
            valid = false;
        }else
        document.form.submit(); 
        return valid;
}

function register(){
    let valid = true;
    if (validateLogin()){
        loginError.innerHTML = loginErrorMsg;
        valid = false;
        }if (!validatePassword()){
            passError.innerHTML=passErrorMsg;
            valid = false;
        }else
        document.form.submit(); 
        return valid;
}
    
let reset = document.getElementById('reset');
reset.addEventListener('click',resetFormError);
function resetFormError() {
    loginError.innerHTML=defaultMsg;
    passError.innerHTML=defaultMsg;
    registerError.innerHTML=defaultMsg;
}