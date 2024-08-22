(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

$('input[name="phone"]').mask("+7 (999) 999-99-99");

$('.response-message-register').on('click', function (e) {
    e.preventDefault();

    $(this).fadeOut();
})

$('.response-message').on('click', function (e) {
    e.preventDefault();

    $(this).fadeOut();
})


$('.cyber_input-file input[type=file]').on('change', function(){
    let file = this.files[0];
    $(this).closest('.cyber_input-file').find('.cyber_input-file-text').html(file.name);
});
