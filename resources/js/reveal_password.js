let passwordButton = document.getElementsByClassName('show-password');

let myFunction = function(e) {
    e.preventDefault();
    let id = this.getAttribute("data-id");
    let type = document.getElementById('show_password__' + id).type;
    if(type == 'text') {
        document.getElementById('show_password__' + id).type = 'password';
    } else {
        document.getElementById('show_password__' + id).type = 'text'
    }
    if(this.innerHTML == 'Hide password') {
        this.innerHTML = 'Show password';
    } else {
        this.innerHTML = 'Hide password';
    }
};

for (let i = 0; i < passwordButton.length; i++) {
    passwordButton[i].addEventListener('click', myFunction, false);
}