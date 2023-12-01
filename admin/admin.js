jQuery(document).ready(function ($) {

    //Sign out admin
    $(document).on('click', '.sign-out', () => {
        $.post('../util/ajax-request.php',
            {
                rType: 'admin-logout'
            },

            function (status) {
                if (status == 'done') {
                    window.location.href = "./";
                }
            });
    });

    //Sign out student
    $(document).on('click', '.sign-out2', () => {
        $.post('../util/ajax-request.php',
            {
                rType: 'student-logout'
            },

            function (status) {
                if (status == 'done') {
                    window.location.href = "./";
                }
            });
    });

    //change admin details
    $('#save-sec').submit(() => {
        let form_data = new FormData(document.getElementById('save-sec'));

        form_data.append('rType', 'edit-admin');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Admin details updated successfully', 'bg-green');
                } else {
                    showErro(status);
                }
            }
        })
    });

    //add student
    $(document).on('click', '.sign-up', () => {
        var mat = $('#matric').val();
        var email = $('#eml').val();
        if (mat == '' || email == '') {
            showErro();
        } else {
            $.post('../util/ajax-request.php',
                {
                    mat,
                    email,
                    rType: 'add-student'
                },
                function (data) {
                    if (data == 'done') {
                        showErro('Account created successfully', 'bg-green');
                        document.getElementById('si-up').reset();
                    }
                    else {
                        showErro(data);
                    }
                });
        }

    });

    //add supervisor
    $(document).on('click', '.sign-up-sp', () => {
        var mat = $('#user-id').val();
        var email = $('#email').val();
        if (mat == '' || email == '') {
            showErro('Enter supervisor user id and email address, user default password is "welcome1"');
            return;
        }
        let form_data = new FormData(document.getElementById('sign-sp'));

        form_data.append('rType', 'add-supervisor');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Account created successfully', 'bg-green');
                } else {
                    showErro(status);
                }
            }
        })
    });

    /*$(document).on('click', '.vie', function (e) {
            
       alert("HER "+$(this).data('target'))
         let form_data = new FormData();
        form_data.append('id', $(this).data('id'));
        form_data.append('rType', 'get-supervisor');   
    
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            datatype: 'jason',       
            success: (status)=>{
                if (status=='not found') {
                    showErro('An Error Occur! Try again');
                }else{
                    let result = JSON.parse(status);
                    let name='';
                    for (const key in result) {
                        if(key == "first_name" && result[key]!=""){
                            name=result[key];
                            continue;
                        }
                        if(key == "last_name" && result[key]!=""){
                            name=name+' '+result[key]
                            continue;
                        }if(key == "first_name" || key == "last_name" && result[key]==""){
                            name='NIL'
                            continue;
                        }if(key == "matric_number"){
                            $('#m-id').val(result[key]);
                            continue;
                        }
                        // if(key == "supervisor"){
                        //     $('#m-id').val(result[key]);
                        //     continue;
                        // }
                        
                    }
                    $('#defaultModal').modal('show');
                }
            }
        });
    });*/

    $('#add-proj').submit(() => {

        let form_data = new FormData(document.getElementById('add-proj'));

        form_data.append('proj_desc', $('#proj-desc').summernote("code"));
        form_data.append('rType', 'add-project');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Project added successfully', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        });
    });

    $('#edit-proj').submit(() => {

        let form_data = new FormData(document.getElementById('edit-proj'));

        form_data.append('proj_desc', $('#proj-desc').summernote("code"));
        form_data.append('rType', 'edit-project');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Project updated successfully', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $('#rep-tic').submit(() => {
        let form_data = new FormData(document.getElementById('rep-tic'));

        form_data.append('rep-msg', $('#rep-msg').summernote("code"));
        form_data.append('rType', 'reply-ticket');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Reply sent successfully.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $(document).on('click', '.solved', () => {

        let form_data = new FormData(document.getElementById('solv'));

        form_data.append('rType', 'tic-solve');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Ticket marked as solved, ticket has been closed successfully.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $(document).on('click', '.rem-ass', () => {

        let form_data = new FormData(document.getElementById('rem-assi'));

        form_data.append('rType', 'remove-assign');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Student was successfully removed from this project.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });


    //Delete project
    $(document).on('click', '#del-proj', () => {

        let form_data = new FormData(document.getElementById('rem-assi'));

        form_data.append('rType', 'delete-project');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Project Deleted Successfully.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    //save student personal details
    $('#save-acct').submit(() => {

        let form_data = new FormData(document.getElementById('save-acct'));

        form_data.append('rType', 'stu-save-acct');
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

    //save student personal details
    $('#sup-save-acct').submit(() => {

        let form_data = new FormData(document.getElementById('sup-save-acct'));

        form_data.append('rType', 'sup-save-acct');
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Account details updated successfully', 'bg-green');
                } else {
                    showErro(status);
                }
            }
        })

    });

    $('#del-acct').on('click', () => {

        var url = new URL(window.location.href)
        id = url.searchParams.get("STUDID");

        let form_data = new FormData();
        form_data.append('rType', 'del-stu');
        form_data.append('id', id);
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Student\'s account was successfully deleted.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    $('#dele-acct').on('click', () => {

        var url = new URL(window.location.href)
        id = url.searchParams.get("SUPID");

        let form_data = new FormData();
        form_data.append('rType', 'del-sup');
        form_data.append('id', id);
        $.ajax({
            url: '../util/ajax-request.php',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (status) => {
                if (status == 'done') {
                    showErro('Supervisor\'s account was successfully deleted.', 'bg-green');
                } else {
                    showErro('An Error Occur! Try again');
                }
            }
        })
    });

    function showErro(text = 'Enter student matric number and email address, student default password is "welcome1"', colorName = 'bg-red') {
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
