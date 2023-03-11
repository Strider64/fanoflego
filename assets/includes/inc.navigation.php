<nav class="nav">
    <input type="checkbox" id="nav-check">

    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <?php

        if ($_SESSION['securityLevel']) {
            echo '<a href="newQuestions.php"> Trivia Upkeep</a>';
            echo '<a href="createGallery.php">Insert Images</a>';
        }
        if (!isset($_SESSION['id'])) {
            echo '<a href="index.php">Home</a>';
            echo '<a href="gallery.php">Gallery</a>';

        } else {
            echo '<a href="members.php">Members</a>';
            echo '<a href="newQuestions.php">New Questions</a>';
            echo '<a href="gallery.php">Gallery</a>';
        }
        ?>

        <a href="trivia.php">Trivia Beta</a>
        <?php
        if (!$_SESSION['loggedIn']) {
            echo '<a href="register.php">Register</a>';
            echo '<a href="policy.php">Policy</a>';
            echo '<a href="contact.php">Contact</a>';
        }
        ?>

        <?php
        if (isset($_SESSION['id'])) {
            echo '<a href="logout.php">Logout</a>';
        }
        ?>
    </div>

    <div class="name-website">
        <h1 class="webtitle">Fan of Lego</h1>
    </div>
</nav>