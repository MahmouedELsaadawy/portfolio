<?php

    //connection
    $conn = mysqli_connect('localhost', 'mahmoud', 'Mahmoud-1995', 'projects');

    //check connection

    if(!$conn){

        echo 'connection: ' . mysqli_connect_error();
    }

    //write query

    $sql1 = 'SELECT name, type, url, file,  about FROM web';
    $sql2 = 'SELECT name, type, url, file, about  FROM designs';

    //make result

    $results1 = mysqli_query($conn, $sql1);
    $results2 = mysqli_query($conn, $sql2);

    //fetch the result

    $webs = mysqli_fetch_all($results1, MYSQLI_ASSOC);
    $designs = mysqli_fetch_all($results2, MYSQLI_ASSOC);

    //free for memory

    /*mysqli_free_result($results1);
    mysqli_free_result($results2);*/

    //close connection
    mysqli_close($conn);

    print_r($sql1);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Home</title>
</head>
<body>

    <nav> 
        <a href="contactMe.php">Contact Me</a>
        <a href="AboutMe.php"> About Me</a>
    </nav>

    <div class="inner-nav">
        
        <a href="#web" class="active">Websites</a>
    
        <a href="#design">Designs</a>
    </div>

    <div class="content">
        
        <div id="web">

            <?php foreach($webs as $web){ ?>

                <a href="<?php echo htmlspecialchars($web['url']); ?>" class="card" >

                    <div class="photo-container">
                        <img src="myWork/websites/<?php echo rawurlencode($web['file']); ?>" alt="">
                    </div>
                    <div class="info-container">
                        <h1> <?php echo htmlspecialchars($web['name']); ?></h1>
                        <h3> <?php echo htmlspecialchars($web['type']); ?></h3>
                        <p> <?php echo htmlspecialchars($web['about']); ?> </p>
                    </div>
                </a>
            <?php } ?>

        </div>

        <div style="display: none;" id="design">
                
                <?php foreach($designs as $design){ ?>

                    <a href="myWork/designs/<?php echo rawurlencode($design['file']); ?>" class="card" >

                        <div class="photo-container">
                            <img src="myWork/designs/<?php echo rawurlencode($design['file']); ?>" alt="">
                        </div>
                        <div class="info-container">
                            <h1> <?php echo htmlspecialchars($design['name']); ?></h1>
                            <h3> <?php echo htmlspecialchars($design['type']); ?></h3>
                            <p> <?php echo htmlspecialchars($design['about']); ?> </p>
                        </div>
                    </a>
                <?php } ?>
        </div>
    </div>
    

    
    <script>
            // Get all the navigation links inside the 'inner-nav' div
            const navLinks = document.querySelectorAll('.inner-nav a');
            // Get all the content sections inside the 'content' div
            const contentSections = document.querySelectorAll('.content > div');

            // Function to handle showing the correct tab
            function showTab(tabId) {
                // First, hide all content sections
                contentSections.forEach(div => {
                    div.style.display = 'none';
                });

                // Then, show the specific section that matches the tab ID
                const activeSection = document.querySelector(tabId);
                if (activeSection) {
                    activeSection.style.display = 'flex';
                }
            }

            // Loop through each navigation link to add a click event listener
            navLinks.forEach(link => {
                link.addEventListener('click', (event) => {
                    // Prevent the default anchor link behavior which would change the URL
                    event.preventDefault();

                    // Remove the 'active' class from all links
                    navLinks.forEach(nav => nav.classList.remove('active'));

                    // Add the 'active' class to the clicked link
                    link.classList.add('active');

                    // Get the ID of the content section from the link's href attribute (e.g., "#web")
                    const targetId = link.getAttribute('href');

                    // Show the corresponding tab content
                    showTab(targetId);
                });
            });

            // Initial check to display the content for the default active tab on page load
            const activeLink = document.querySelector('.inner-nav a.active');
            if (activeLink) {
                const initialTargetId = activeLink.getAttribute('href');
                showTab(initialTargetId);
            }
    </script>


</body>
</html>