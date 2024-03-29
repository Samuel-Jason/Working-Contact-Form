const form = document.querySelector('form');
const statusTxt = form.querySelector('.button-area span');

form.onsubmit = (e) => {
    e.preventDefault();
    statusTxt.style.display = 'block';

    let xhr = new XMLHttpRequest();
    xhr.open('POST', "message.php", true);
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.response;

            if (response.indexOf("Email e Senha é necessario") != -1 || response.indexOf("Email e Senha é necessario!")) {
                statusTxt.style.color = "red";
            }
        } else {
            form.reset();
            setTimeout(() => {
                statusTxt.style.display = 'none';
            }, 3000);
        }
        statusTxt.innerHTML = response;
    };

    let formData = new FormData(form);
    xhr.send(formData);
};
