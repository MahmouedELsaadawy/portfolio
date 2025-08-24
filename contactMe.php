<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Contact</title>
</head>
<body>

    <nav class="navs">

        <div class="nav-container">
            <a href="home.php">Home</a>
            <a href="AboutMe.php">Aboute Me</a>
        </div>
    </nav>

    <h1 class="head">Send E-mail</h1>

    <div class="container">

        <form action="https://api.web3forms.com/submit" method="POST" class="form">

            <input type="hidden" name="access_key" value="2a90b953-7cb6-455c-8eff-92ce5e21bb17">

            <p>Name</p>
            <input type="text" name="Name" placeholder="Name" class="contactInput" required>

            <p>Email</p>
            <input type="email" name="Email" placeholder="Email" class="contactInput" required>

            <p>Message</p>
            <textarea name="Message"  id="Message" class="contactInput" placeholder="Message"></textarea>

            <button type="submit">Send</button>
        </form>

    </div>

    <h1 class="options">________ OR ________</h1>

    <div class="other-links">

        <a href="https://wa.me/905343265968" class="wp"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="https://www.linkedin.com/in/mahmoud-elsaadawy-283540214/" class="wp"><i class="fa-brands fa-square-linkedin"></i></a>
        

    </div>
    
</body>
</html>