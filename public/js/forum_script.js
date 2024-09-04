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

$("#test_table").fancyTable({
    sortColumn:2,
    // pagination: true,
    perPage:10,
    globalSearch:true,
    inputPlaceholder: 'Поиск по таблице',
    pagination: 'btn btn-primary',
    paginationClassActive: 'active',
});

$('.image-link').viewbox({
    setTitle: true,
    margin: 20,
    resizeDuration: 300,
    openDuration: 200,
    closeDuration: 200,
    closeButton: true,
    navButtons: true,
    closeOnSideClick: true,
    nextOnContentClick: true
});

$('.delete_user').on('click', function (e) {
    if(!confirm("Вы уверены, что хотите удалить пользователя?")) return false;
    var pass = prompt('Введите пароль:', '');

    if(pass != 12345678) {
        alert('Неверный пароль');
        return false;
    }
})

$('.add_question').off('click');
$('.add_question').on('click', function (e) {
    e.preventDefault();

    var areasAmount = $('.answers textarea').length;
    var type = 'radio';
    var fieldName = 'right_answer';


    if($('input[name="type"]:checked').val() == 2) {
        type = 'checkbox';
        fieldName = 'right_answer[]';
    } else {
        console.log(111)
    }

    $('.answers').append(
        '<div class="d-flex align-items-center justify-content-between mt-3">' +
            '<div style="margin-right: 25px;"><input type="'+ type +'" name="'+ fieldName +'" value="'+ (areasAmount + 1) +'"></div>' +
            '<div class="flex-fill"><textarea name="answers[]" rows="2" class="form-control" placeholder="Вариант '+ (areasAmount + 1) +'"></textarea></div>' +
            '<div style="margin-left: 25px;"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить ответ" class="btn btn-outline-danger btn-sm delete_question" style="font-size: 10px"><i class="fa-solid fa-times"></i></a></div>' +
        '</div>'
    );

    $('.delete_question').on('click', function (e) {
        e.preventDefault();

        $(this).parent().parent().remove();
    })
})

$('.start_test').on('click', function (e) {
    e.preventDefault();
    if(!confirm('Вы уверены, что хотите начать тестирование')) return false;

    $(this).slideUp()

    var min = $('#countdown').attr('data-value');
    if(min == 0) {
        jQuery('.test-overlay').hide();
        return false;
    }
    var sec = 0;

    $('.test-overlay').hide();

    var interval = setInterval(function() {
        if(sec == 0) {
            if(min == 0) {
                $('#timerText').html('0:00');
                clearInterval(interval);
                $('.test_form').trigger('submit')
                return false;
            }
            min--;
            sec = 60;
        }
        sec--;
        if(min < 10) {
            if(typeof(min) == 'string') {
                min = min.replace('0', '')
            }
            min = '0' + min;
        }
        if(sec < 10) {
            sec = '0' + sec;
        }
        $('#timerText').html(min + ':' + sec);

    }, 1000)
})
