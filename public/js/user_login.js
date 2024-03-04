$("#user_login").validate({

    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
    },
    messages: {
        email: {
            required: "Please enter valid email",
        },
        password: {
            required: "Please Enter password",
        },
    }
})