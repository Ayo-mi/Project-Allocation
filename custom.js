jQuery(document).ready(function($){

    //login
$(document).on('click', '.log-btn', function (e) {
    
    e.preventDefault();
    var user = $('#user').val();
    var psw = $('#psw').val();
    if (user == '' || psw == '') {                
        showErro();
    }else{
        $.post('util/ajax-request.php',
        {
            user,
            psw,
            rType: 'login'
    },
        function (data) {
            if (data == '1') {                
                window.location.href="admin/";                
            }else if (data == '2') {                
                window.location.href="student/";                
            }else if (data == '3') {                
                window.location.href="supervisor/";                
            }
            else{                    
                showErro('User ID or password not correct');              
            }
        });
    }
})
})

function showErro(text ='Enter your username and password, leave no field empty') {
    var placementFrom = $('.jsdemo-notification-button button').data('placement-from');
        var placementAlign = $('.jsdemo-notification-button button').data('placement-align');
        var animateEnter = $('.jsdemo-notification-button button').data('animate-enter');
        var animateExit = $('.jsdemo-notification-button button').data('animate-exit');
        var colorName = $('.jsdemo-notification-button button').data('color-name');

        showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit);
}

$(function () {
    $('.jsdemo-notification-button button').on('click', function () {
        var placementFrom = $(this).data('placement-from');
        var placementAlign = $(this).data('placement-align');
        var animateEnter = $(this).data('animate-enter');
        var animateExit = $(this).data('animate-exit');
        var colorName = $(this).data('color-name');

        showNotification(colorName, null, placementFrom, placementAlign, animateEnter, animateExit);
    });
});

function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Enter your username and password, leave no field empty'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
}