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


    // $('.gallery_image_link').off('click');
    // $('.gallery_image_link').on('click', function (e) {
    //     e.preventDefault();
    //
    //     $('body').append(
    //         '<div class="overlay_data" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 10000; background: rgba(0,0,0,0.8); display: flex; justify-content: center; align-items: center; padding: 50px 0;">' +
    //             '<img style="height: 100%; object-fit: cover; border-radius: 20px" src="/'+ $(this).attr('href') +'">' +
    //         '</div>'
    //     )
    //
    //     $('.overlay_data').on('click', function (e) {
    //         $(this).remove()
    //     })
    //
    //     console.log($(this).attr('href'))
    // })

    $('.gallery_image_link').viewbox({
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


    function responseFunction(res)
    {
        $('.response-message').hide(300);

        if(res == 0) {
            $('body').append(
                '<div class="response-message bg-danger" style="border-radius: 5px; padding: 15px;">' +
                '<div class="d-flex align-items-center">' +
                '<div style="margin-right: 15px;"><i class="fa-solid fa-ban fs-1"></i></div>' +
                '<div>' +
                '<div>Что-то пошло не так</div>' +
                '<div><small style="font-size: 10px">Нажмите, чтобы скрыть</small></div>' +
                '</div>' +
                '</div>' +
                '</div>')
        }
        if(res == 2 || res == 3) {
            $('body').append(
                '<div class="response-message bg-success" style="border-radius: 5px; padding: 15px;">' +
                '<div class="d-flex align-items-center">' +
                '<div style="margin-right: 15px;"><i class="fa-solid fa-check fs-1"></i></div>' +
                '<div>' +
                '<div>Данные обновлены</div>' +
                '<div><small style="font-size: 10px">Нажмите, чтобы скрыть</small></div>' +
                '</div>' +
                '</div>' +
                '</div>')
        }
        if(res == 1) {
            $('body').append(
                '<div class="response-message bg-success" style="border-radius: 5px; padding: 15px;">' +
                '<div class="d-flex align-items-center">' +
                '<div style="margin-right: 15px;"><i class="fa-solid fa-check fs-1"></i></div>' +
                '<div>' +
                '<div>Данные добавлены</div>' +
                '<div><small style="font-size: 10px">Нажмите, чтобы скрыть</small></div>' +
                '</div>' +
                '</div>' +
                '</div>')
        }

        $('.response-message').on('click', function (e) {
            e.preventDefault();

            $(this).fadeOut();
        })

        setTimeout(function () {
            $('.response-message').fadeOut();
        }, 3000);
    }

// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

    var pusher = new Pusher('0a5e591fa35b879dd4eb', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('doc-channel');
    channel.bind('doc-confirm', function(data) {
        var btn = $('.docs_confirm[data-user-id="'+ data.user_id +'"]');

        if(data.action === 'income_confirm') btn = $('.income_confirm[data-user-id="'+ data.user_id +'"]');

        if($(btn).hasClass('btn-outline-primary')) {
            $(btn).removeClass('btn-outline-primary').addClass('btn-outline-success').html('<i class="fa-solid fa-circle-check"></i>')
        } else {
            $(btn).removeClass('btn-outline-success').addClass('btn-outline-primary').html('<i class="fa-solid fa-file"></i>')
            if(data.action === 'income_confirm') $(btn).removeClass('btn-outline-success').addClass('btn-outline-primary').html('<i class="fa-solid fa-car"></i>')
        }

        if(data.action === 'income_confirm') {
            var income = Number($('#income_confirm_amount').text())
            if(data.expression === 'plus') income += 1;
            if(data.expression === 'minus') income -= 1;

            $('#income_confirm_amount').html(income)
        }
        if(data.action === 'docs_confirm') {
            var docs = Number($('#docs_confirm_amount').text())
            if(data.expression === 'plus') docs += 1;;
            if(data.expression === 'minus') docs -= 1;;
            $('#docs_confirm_amount').html(docs)
        }



    });

    $('.docs_confirm').off('click');
    $('.docs_confirm').on('click', function (e) {
        e.preventDefault();

        // if (!confirm('Вы уверены, что хотите подтвердить факт выдачи комплектов документов?')) return false;

        $.ajax({
            type: "POST",
            url: "/user-docs-confirm",
            data: {
                'user_id': $(this).attr('data-user-id'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: $(this),
            success: function (response) {
                let res = $.trim(response);
                responseFunction(res)
            }
        })
    });

    $('.income_confirm').off('click');
    $('.income_confirm').on('click', function (e) {
        e.preventDefault();

        // if (!confirm('Вы уверены, что хотите подтвердить факт приезда участника форума?')) return false;

        $.ajax({
            type: "POST",
            url: "/user-income-confirm",
            data: {
                'user_id': $(this).attr('data-user-id'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            context: $(this),
            success: function (response) {
                let res = $.trim(response);
                responseFunction(res)
            }
        })
    });

})()



// // Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;
//
// var pusher = new Pusher('0a5e591fa35b879dd4eb', {
//     cluster: 'ap1'
// });
//
// var channel = pusher.subscribe('doc-channel');
// channel.bind('doc-confirm', function(data) {
//     alert(JSON.stringify(data));
// });

/*
* Выдача комплекта документов
* */

// function confirmDocs()
// {
//     $('.docs_confirm').off('click')
//     $('.docs_confirm').on('click', function (e) {
//         e.preventDefault();
//
//         $.ajax({
//             type: "POST",
//             url: "/user-docs-confirm",
//             data: {
//                 'user_id': $(this).attr('data-user-id'),
//             },
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             context: $(this),
//             success: function (response) {
//                 let res = $.trim(response);
//                 responseFunction(res)
//                 $(this).removeClass('btn-outline-primary').addClass('btn-outline-success').html('<i class="fa-solid fa-check-circle"></i>')
//                 // Enable pusher logging - don't include this in production
//                 Pusher.logToConsole = true;
//
//                 var pusher = new Pusher('0a5e591fa35b879dd4eb', {
//                     cluster: 'ap1'
//                 });
//
//                 var channel = pusher.subscribe('doc-channel');
//                 channel.bind('doc-confirm', function(data) {
//                     alert(JSON.stringify(data));
//                 });
//
//             }
//         })
//     })
//
// }
// /*
// * первичная загрузка таблицы с зарегистрированными пользователями для регистрации
// * */
//
// function loadTable() {
//
//     $.ajax({
//         type: "GET",
//         url: "/get-registered-members",
//         // data: {
//         //     'region': 'get',
//         // },
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         // context: $(this),
//         success: function (response) {
//             let res = $.trim(response);
//             $('#register_user_income_table').html(res)
//             confirmDocs()
//         }
//     })
// }
//
// loadTable()


