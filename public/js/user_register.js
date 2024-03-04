
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#user_create").validate({

    rules: {
        first_name: {
            required: true,
            maxlength: 30
        },
        last_name: {
            required: true,
            maxlength: 30
        },
        email: {
            required: true,
            email: true
        },
        mobile_number: {
            required: true,
            digits: true,
            minlength: 10,
                maxlength: 10
        },
        gender: {
            required: true,
        },
        password: {
            required: true
        },
        password_confirmation: {
            required: true,
            equalTo: "#password" 
        },
        country: {
            required: true,
        },
        state: {
            required: true,
        },
        district: {
            required: true,
        },
        // city: {
        //     required: true,
        // },
        
        'hobbies[]': {
            required: true,
            minlength: 2
        }
    },
    messages: {
        first_name: {
            required: "Please enter First Name",
        },
        last_name: {
            required: "Please enter Last Name",
        },
        email: {
            required: "Please enter valid email",
        },
        mobile_number: {
            required: "Please enter Mobile Number",
             digits: "Mobile number must contain only digits",
             minlength: "Mobile number must be 10 digits",
                maxlength: "Mobile number must be 10 digits"
        },
        gender: {
            required: "Please select gender",
        },
        password: {
            required: "Please Enter password",
        },
            confirm_password: {
            required: "Please confirm your password",
            equalTo: "Passwords do not match"
        },
        country: {
            required: "Please select country",
        },
        state: {
            required: "Please select state",
        },
        district: {
            required: "Please select district",
        },
        city: {
            required: "Please select  city",
        },
        'hobbies[]': {
                required: "Please select the hobbie",
                minlength: "Value must be at least 2"
        },
    }
})

