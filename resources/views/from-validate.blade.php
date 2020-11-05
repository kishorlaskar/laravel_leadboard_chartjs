<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
        body {
            margin: 20px 0;
            font-family: 'Lato';
            font-weight: 300;
            font-size: 1.25rem;
            width: 300px;
        }

        form, p {
            margin: 20px;
        }

        p.note {
            font-size: 1rem;
            color: red;
        }

        input, textarea {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 4px;
            font-family: 'Lato';
            width: 300px;
            margin-top: 10px;
        }

        label {
            width: 300px;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        label span {
            font-size: 1rem;
        }

        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error, textarea.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }

        [type="submit"], [type="reset"], button, html [type="button"] {
            margin-left: 0;
            border-radius: 0;
            background: green;
            color: white;
            border: none;
            font-weight: 300;
            padding: 10px 0;
            line-height: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <form id="basic-form" action="" method="post">
        <p>
            <label for="name">Name <span>(required, at least 3 characters)</span></label>
            <input id="name" name="name" minlength="3" type="text" required>
        </p>
        <p>
            <label for="address">Address <span>(required, at least 3 characters)</span></label>
            <input id="address" name="address" minlength="3" type="text" required>
        </p>
        <p>
            <label for="phone_number">Phone Number<span>(required, at least 11 characters)</span></label>
            <input id="phone_number" name="phone_number" minlength="11" type="text" required>
        </p>
        <p>
            <label for="email">E-Mail <span>(required)</span></label>
            <input id="email" type="email" name="email" required>
        </p>
        <p>
            <input class="submit" type="submit" value="SUBMIT">
        </p>
    </form>

</div>

<script>
    $(document).ready(function() {
        $("#basic-form").validate({
            rules: {
                name : {
                    required: true,
                    minlength: 3
                },
                address : {
                    required: true,
                    minlength: 3
                },
                phone_number : {
                    required: true,
                    minlength: 11
                },
                age: {
                    required: true,
                    number: true,
                    min: 18
                },
                email: {
                    required: true,
                    email: true
                },
                weight: {
                    required: {
                        depends: function(elem) {
                            return $("#age").val() > 50
                        }
                    },
                    number: true,
                    min: 0
                }
            },
            messages : {
                name: {
                    minlength: "Name should be at least 3 characters"
                },
                address: {
                    minlength: "Address should be at least 3 characters"
                },
                phone_number: {
                    minlength: "Phone NUmber should contain 11 digits."
                },
                age: {
                    required: "Please enter your age",
                    number: "Please enter your age as a numerical value",
                    min: "You must be at least 18 years old"
                },
                email: {
                    email: "The email should be in the format: abc@domain.tld"
                },
                weight: {
                    required: "People with age over 50 have to enter their weight",
                    number: "Please enter your weight as a numerical value"
                }
            }
        });
    });
</script>

</body>
</html>
