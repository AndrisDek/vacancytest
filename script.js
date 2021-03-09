const whiteBlock = document.getElementById("whiteBlock");
const whiteLoginBlock = document.getElementById("whiteLoginBlock");
const whiteSignUpBlock = document.getElementById("whiteSignUpBlock");
const togglePassword = document.querySelector('#togglePassword');
const signUpPassword = document.getElementById("signup-password");
const signUpPasswordIcon = document.getElementById("signup-password-icon");
const signUpName = document.getElementById("signup-name");
const signUpNameIcon = document.getElementById("signup-name-icon");
const signUpEmail = document.getElementById("signup-email");
const signUpEmailIcon = document.getElementById("signup-email-icon");
const whiteLoginButton = document.getElementById("login-submit-button");

function moveToSignUp() {
    whiteBlock.style.left = "26%";
    whiteBlock.style.transition = "0.5s ease-out";
    whiteSignUpBlock.style.display = "block";
    whiteLoginBlock.style.display = "none";
}

function moveToLogin() {
    whiteBlock.style.left = "74%";
    whiteBlock.style.transition = "0.5s ease-out";
    whiteSignUpBlock.style.display = "none";
    whiteLoginBlock.style.display = "block";
}

togglePassword.addEventListener('click', function (e) {
    const type = signUpPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    signUpPassword.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye-slash');
})

function checkSignUpUserName() {
    signUpName.value.length > 2 ? signUpNameIcon.style.color = "blue" : signUpNameIcon.style.color = "unset";
}
setInterval(checkSignUpUserName, 1000);

function checkSignUpEmail() {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    re.test(signUpEmail.value.toLowerCase()) === true ? signUpEmailIcon.style.color = "blue" : signUpEmailIcon.style.color = "unset";
}
setInterval(checkSignUpEmail, 1000);

function checkSignUpPassword() {
    signUpPassword.value.length > 7 ? signUpPasswordIcon.style.color = "blue" : signUpPasswordIcon.style.color = "unset";
}
setInterval(checkSignUpPassword, 1000);