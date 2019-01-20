$(document).ready(function () {
    // Display current password is correct
    $("#current_pwd").click(function () {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: "get",
            url: "/admin/check-pwd",
            data: {
                current_pwd: current_pwd
            },
            success: function (resp) {
                if (resp == "false") {
                    $("#chkPwd").html(
                        "<font color='red'>Current Password is incorrect</font>"
                    );
                } else if (resp == "true") {
                    $("#chkPwd").html(
                        "<font color='green'>Current Password is correct</font>"
                    );
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });

    $("input[type=checkbox],input[type=radio],input[type=file]").uniform();
    $("select").select2();

    // Form Validation
    $("#basic_validate").validate({
        rules: {
            required: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            date: {
                required: true,
                date: true
            },
            url: {
                required: true,
                url: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    $("#number_validate").validate({
        rules: {
            min: {
                required: true,
                min: 10
            },
            max: {
                required: true,
                max: 24
            },
            number: {
                required: true,
                number: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });

    //--- Category ---//
    // Category Add Validation
    $("#add_category").validate({
        rules: {
            category_name: {
                required: true
            },
            description: {
                required: true
            },
            url: {
                required: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    // Edit Category Validations
    $("#edit_category").validate({
        rules: {
            category_name: {
                required: true
            },
            description: {
                required: true
            },
            url: {
                required: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    // Confirm Delete
    $("#deleteCat").click(function () {
        if (confirm('Are you sure you want to delete this category?')) {
            return true;
        }
        return false;
    });

    $("#number_validate").validate({
        rules: {
            min: {
                required: true,
                min: 10
            },
            max: {
                required: true,
                max: 24
            },
            number: {
                required: true,
                number: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    $("#password_validate").validate({
        rules: {
            current_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            new_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            confirm_pwd: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo: "#new_pwd"
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    //--- Products --//
    // Products Add Validation
    $("#add_product").validate({
        rules: {
            category_id: {
                required: true
            },
            product_name: {
                required: true
            },
            product_code: {
                required: true
            },
            description: {
                required: true
            },
            price: {
                required: true,
                number: true
            },
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    $("#edit_product").validate({
        rules: {
            category_id: {
                required: true
            },
            product_name: {
                required: true
            },
            product_code: {
                required: true
            },
            description: {
                required: true
            },
            price: {
                required: true,
                number: true
            },
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .addClass("error");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element)
                .parents(".control-group")
                .removeClass("error");
            $(element)
                .parents(".control-group")
                .addClass("success");
        }
    });

    // Confirm Delete
    // $("#deleteProduct").click(function () {
    //     if (confirm('Are you sure you want to delete this product?')) {
    //         return true;
    //     }
    //     return false;
    // });

    $(".deleteRecord").click(function () {
        // alert("test");
        var id = $(this).attr('rel');
        var deleteFunction = $deleteFunction = $(this).attr('rel1');
        // alert(id);

        swal({
                title: "Warning!",
                text: "You will not be able to revert this.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
                confirmButtonText: "Yes, delete product",
                cancelButtonText: "No, cancel",
                buttonStyling: false,
                reverseButton: true,
            },
            function () {
                window.location.href = "/admin/" + deleteFunction + "/" + id;
            });
    });

});
