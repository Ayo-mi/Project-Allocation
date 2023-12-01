jQuery(document).ready(function ($) {

    //Sign out student
    $(document).on('click', '.sign-out2', () => {
        $.post('../util/ajax-request.php',
            {
                rType: 'supervisor-logout'
            },

            function (status) {
                if (status == 'done') {
                    window.location.href = "../sign-in";
                }
            });
    });

    //save username and password
    $('#save-sec').submit(() => {

        let form_data = new FormData(document.getElementById('save-sec'));

        form_data.append('rType', 'save-sup-psw');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Security settings updated successfully', 'bg-green');
                } else {
                    showErro(status);
                }
            }
        })
    });

    //save personal details
    $('#sup-save-acct').submit(() => {

        let form_data = new FormData(document.getElementById('sup-save-acct'));

        form_data.append('rType', 'supervisor-save-acct');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Account settings updated successfully', 'bg-green');
                } else {
                    showErro(status);
                }
            }
        })
    });


    $(document).on('click', '.sup-choose-project', function (e) {
        let form_data = new FormData();
        form_data.append('rType', 'sup-choose-project');
        form_data.append('id', $(this).data('id'));
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Project Approved Successfully!', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $(document).on('click', '.sup-choose-cus-project', function (e) {

        let form_data = new FormData();
        form_data.append('rType', 'sup-choose-cus-project');
        form_data.append('id', $(this).data("id"));
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Custom Project Approved Successfully!', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $('#add-ticket').submit(() => {

        let form_data = new FormData(document.getElementById('add-ticket'));

        form_data.append('tic_desc', $('#tic-desc').summernote("code"));
        form_data.append('rType', 'add-ticket');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Ticket was sent successfully. An admin operator will get back to you.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    //Delete ticket
    $(document).on('click', '.del-tic', () => {

        let form_data = new FormData(document.getElementById('rem-tic'));

        form_data.append('rType', 'delete-ticket');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Ticket Deleted Successfully.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    function showErro(text = '', colorName = 'bg-red') {
        var placementFrom = $('.jsdemo-notification-button button').data('placement-from');
        var placementAlign = $('.jsdemo-notification-button button').data('placement-align');
        var animateEnter = $('.jsdemo-notification-button button').data('animate-enter');
        var animateExit = $('.jsdemo-notification-button button').data('animate-exit');
        //var colorName = $('.jsdemo-notification-button button').data('color-name');

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

});