<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Working with forms</title>

    <style>
        form{
            display: flex;
            flex-direction: column;
            padding: 1em;
        }

        .group-element{
            display:flex;
            flex-direction: column;
            row-gap: normal;
        }

        label, .input-form{
            margin: .5em;
        }

        .input-form, textarea{
            padding: 1em;
            font-size: 110%;
        }

        .button{
            background: steelblue;
            color: #fff;
            padding: 1em;
            font-size: 120%;
            border: 1px solid transparent;
            border-radius: 10px;
            width: 25%;
        }
    </style>
</head>
<body>

<form action="process.php" method="post" enctype="application/x-www-form-urlencoded">
    <div class="group-element">
        <label class="label" for="name">Name</label>
        <input class="input-form" type="text" placeholder="Name" name="username" id="name">
    </div>

    <div class="group-element">
        <label class="label" for="email">Email</label>
        <input class="input-form" type="text" placeholder="Email" name="email" id="email">
    </div>

    <div class="group-element">
        <label class="label" for="phone_number">Phone number</label>
        <input class="input-form" type="text" placeholder="Phone number" name="phone_number" id="phone_number">
    </div>

    <div class="group-element">
        <label class="label" for="message">Message</label>
        <textarea class="input-form" name="message" id="message" cols="30" rows="10" placeholder="Your message"></textarea>
    </div>

    <div class="group-element">
        <label class="label" for="rgpd">
            <input class="input-form" type="checkbox" name="rgpd" id="rgpd"> Accept the rgpd
        </label>

    </div>

    <div class="group-element">
        <button class="button button_primary">Send</button>
    </div>

</form>

</body>
</html>