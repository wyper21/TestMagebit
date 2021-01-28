"use strict";
let req = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/;
let inp = document.getElementById('input');
let span = document.getElementById('text');
let cBox = document.getElementById('ckbox');

document.querySelector('.btn').addEventListener('click', function(event) {
    let isValid = validateForm();
    if (!isValid) {
        event.preventDefault();
    }
});

function validateForm() {

    if (inp.value === '') {
        notValid(inp, span,"Email address is required");
        return false;
    } else if(!validate(req, inp.value)) {
        notValid(inp, span, "Please provide a valid e-mail address");
        return false;
    } else if (inp.value.substr(-3 ) === '.co') {
        notValid(inp, span, "We are not accepting subscriptions from Colombia emails");
        return false;
    } else if (!cBox.checked ) {
        span.innerHTML = "You must accept the terms and conditions";
        return false;
    } else
    {
        valid(inp, span, '');
        return true;
    }


}

function validate(req, inp){
    return req.test(inp);
}

function notValid(inp, el, mess){
    inp.classList.add('is-invalid');
    el.innerHTML = mess;
}

function valid(inp, el, mess) {
    inp.classList.remove('is-invalid');
    inp.classList.add('is-valid');
    el.innerHTML = mess;
}


