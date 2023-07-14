
function autoComplete() {
    var searchValue = document.getElementById("search");
    // console.log(searchValue);

    var url = "http://127.0.0.1:8000/autoComplete?query=" + searchValue.value + "";
    console.log(url);

    var xhr = new XMLHttpRequest();

    xhr.open('GET', url, true);

    xhr.send();

    // var response = [];

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(xhr.responseText);
            var suggestions = JSON.parse(xhr.responseText);
            // console.log(suggestions);

            // for (let index = 0; index < suggestions.length; index++) {
            //     const suggestion = suggestions[index];
            //     console.log(suggestion);
            //     // suggestions.forEach(suggestion => {
            //     //     console.log(suggestion);
            //     // });
            // }

            suggestions.forEach(suggestion => {
                const option = document.createElement("div");
                option.textContent = suggestion;
                option.addEventListener("click", () => {
                    searchValue.value = suggestion;
                    // autocomplete.innerHTML = "";
                });
                // autocomplete.appendChild(option);
            });

        }
    }
}

function authentify(event) {
    event.preventDefault()
    const form = new FormData(event.target)
    const xhr = new XMLHttpRequest()
    xhr.open('POST', '/authentify', true)
    xhr.send(form)
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const response = this.responseText
            if (response == "0")
                Swal.fire(
                    'Erreur !',
                    'Email ou mot de passe incorrect !',
                    'error'
                )
            else
                window.location.href = "/"
        }
    }
}

function sign_up(event) {
    event.preventDefault()
    const form = new FormData(event.target)
    const xhr = new XMLHttpRequest()
    xhr.open('POST', '/insert', true)
    xhr.send(form)
    xhr.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            const response = this.responseText
            if (response == "0")
                Swal.fire(
                    'Erreur !',
                    'Une erreur innattendue s\'est produite !',
                    'error'
                )
            else
                window.location.href = "/login"
        }
    }
}

function search(event) {
    event.preventDefault()
    alert('oui je te vois')
}


if (document.getElementById('login-form'))
    document.getElementById('login-form').addEventListener('submit', authentify)
if (document.getElementById('sign-up-form'))
    document.getElementById('sign-up-form').addEventListener('submit', sign_up)
if (document.getElementById('invite-button'))
    document.getElementById('invite-button').addEventListener('click', function () {
        const invite_form = document.getElementById('invite-form')
        if (invite_form.style.display == 'none') {
            invite_form.style.display = ''
        }
        else
            invite_form.style.display = 'none'
    })
if (document.getElementById('invite-form'))
    document.getElementById('invite-form').addEventListener('submit', search)