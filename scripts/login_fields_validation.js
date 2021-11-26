const email_regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
window.onload = function(){
    document.getElementById('login_btn').addEventListener('click', function(event){
        event.preventDefault();
        divs = document.getElementsByClassName('invalid-feedback');
        email = document.getElementById('email');
        senha = document.getElementById('password');
        valida_email = true;
        valida_senha = true;

        if (!(email_regex.test(email.value.toLowerCase()))) {
            divs[0].style.display='block';
            valida_email = false;
        }
        else{
            divs[0].style.display='none';
            valida_email = true;
        }

        if (senha.value == ''){
            divs[1].style.display='block';
            valida_senha = false;
        }
        else{
            divs[1].style.display='none';
            valida_senha = true;
        }

        if (valida_email && valida_senha){
            document.getElementById('form_login').submit();
        }

    })
}