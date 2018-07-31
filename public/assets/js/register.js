$(document).ready(function () {

    valid_length("name", 3);
    valid_length("middle_name", 3);
    valid_length("last_name", 3);
    valid_length("user_name", 3);
    valid_length("address", 10);
    valid_length("city", 3);
    valid_length("beneficiary", 3);
    valid_national_id();
    valid_parent_id();
    valid_phone();
    valid_email();
    valid_password();
    form_validation();


    function form_validation() {
        $("#register_form").each(function () {
            var element = $(this);
            if (element.val() == "") {
                $("#register_form #submit_btn").prop('disabled', true);
            }
        });

    }

    function valid_length(id, length) {

        $("#register_form #" + id).on('input', function (e) {
            if ($(this).val().length < length) {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
                msg = id + " must match length of " + length;
                $("#auth_message").text(msg);
            }
            else {
                $(this).css('border-color', '#08bb90');
                $("#register_form #submit_btn").prop('disabled', false);
            }
        });

    }

    function valid_parent_id() {
        $("#register_form #parent_id").on('input', function (e) {
            if ($(this).val().match(/^\d+$/)) {
                if ($(this).val().length > 5) {
                    $(this).css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $(this).css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }
            }
            else {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
        });
    }

    function valid_national_id() {
        $("#register_form #national_id").on('input', function (e) {
            if ($(this).val().match(/^\d+$/)) {
                if ($(this).val().length > 9) {
                    $(this).css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $(this).css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }
            }
            else {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
        });
    }

    function valid_phone() {
        $("#register_form #phone").on('input', function () {

            if ($(this).val().match(/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/)) {
                $(this).css('border-color', '#08bb90');
                $("#register_form #submit_btn").prop('disabled', false);
            }
            else {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
        });

    }

    function valid_email() {
        $("#register_form #email").on('input', function () {

            if ($(this).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $(this).css('border-color', '#08bb90');
                $("#register_form #submit_btn").prop('disabled', false);
            }
            else {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
        }).focusout(function () {

            $.get("ajax/check_email/" + $(this).val(), function (data, status) {
                if (data == false) {
                    $(this).css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $("#register_form #email").css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }
            });

        });

    }

    function valid_password() {
        $("#register_form #password").on('input', function (e) {
            if ($(this).val().length < 6) {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
            else {

                $(this).css('border-color', '#08bb90');

                if ($(this).val() == $("#register_form #password_confirmation").val()) {
                    $("#register_form #password_confirmation").css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $("#register_form #password_confirmation").css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }
            }
        });

        $("#register_form #password_confirmation").on('input', function (e) {
            if ($(this).val().length < 6) {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
            else {
                $(this).css('border-color', '#08bb90');
                if ($(this).val() == $("#register_form #password").val()) {
                    $(this).css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $(this).css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }

            }
        });

        $("#register_form #inside_password").on('input', function (e) {
            if ($(this).val().length < 6) {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
            else {

                if ($(this).val() == $("#register_form #inside_password_confirmation").val()) {
                    $("#register_form #inside_password_confirmation").css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $("#register_form #inside_password_confirmation").css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }

                $(this).css('border-color', '#08bb90');
                $("#register_form #submit_btn").prop('disabled', false);

            }
        });

        $("#register_form #inside_password_confirmation").on('input', function (e) {
            if ($(this).val().length < 6) {
                $(this).css('border-color', '#9c488d');
                $("#register_form #submit_btn").prop('disabled', true);
            }
            else {
                if ($(this).val() == $("#register_form #inside_password").val()) {
                    $(this).css('border-color', '#08bb90');
                    $("#register_form #submit_btn").prop('disabled', false);
                }
                else {
                    $(this).css('border-color', '#9c488d');
                    $("#register_form #submit_btn").prop('disabled', true);
                }

            }
        });

    }


});