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
            echo '<a href="admin.php">Admin</a>';
            echo '<a href="blog.php">Blog</a>';
            echo '<a href="newQuestions.php">New Questions</a>';
            echo '<a href="modifyTrivia.php">Edit Questions</a>';
        }

        ?>


        <a href="game.php">Trivia</a>


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