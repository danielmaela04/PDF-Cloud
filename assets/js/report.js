$(document).ready(function () {
    $('#ajax').submit(function () {
        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "src/report.php",
            data: dados,
            success: function (data) {
                alert("Enviado com sucesso.")
            }
        });

        return false;
    });
});

window.onload = function () {
    const form = document.getElementById('ajax');
    form.addEventListener('submit', function handleSubmit(event) {
        event.preventDefault();
        form.reset();
    });
}

let modal = document.querySelector(".preview")
let modal_2 = document.querySelector(".preview-pdf")

function openModal() {
    modal.style.display = 'block';
}

function closeModal() {
    modal.style.display = 'none';
}

function openModal_pdf() {
    modal_2.style.display = 'block';
}

function closeModal_pdf() {
    modal_2.style.display = 'none';
}