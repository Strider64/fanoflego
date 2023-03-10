<?php

/*
 * The Photo Tech Guru
 * Created by John R. Pepp
 * Date Created: July, 12, 2021
 * Last Revision: March 11, 2023 @ 7:00 pm
 * Version: 5.00 ßeta
 * Big Time Credit goes to
 * Annastasshia for the gallery design
 * https://codepen.io/annastasshia
 * without her contribution and
 * kindness of sharing this gallery
 * page would not be what it is.
 *
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <style>
        .sidebar_pages {
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            justify-content: flex-start;
            height: auto;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" media="all" href="assets/css/gallery.css">


</head>
<body class="site">

<?php include_once 'assets/includes/inc.navigation.php'; ?>
<main class="content">
    <div class="main_container">
        <div class="home_article">
            <div class="container">

            </div>
        </div>
        <div class="home_sidebar">

            <form id="gallery_category" action="gallery.php" method="post">
                <label for="category"></label><select id="category" class="select-css" name="category"
                                                                       tabindex="1">
                    <option selected disabled>Select a Category</option>
                    <option value="lego"  selected>LEGO</option>
                    <option value="general">General</option>
                    <option value="wildlife">Wildlife</option>
                    <option value="landscape">Landscape</option>

                    <option value="halloween">Halloween</option>
                </select>
            </form>

            <div class="sidebar_pages">

            </div>
        </div>
    </div>

</main>
<aside class="sidebar">

</aside>
<div class="lightbox">

</div>
<footer class="colophon">
    <p>&copy; <?php echo date("Y") ?> Fan of LEGO</p>
</footer>

<script src="assets/js/images.js"></script>
<!--

 Copyright (c) 2022 by Annastasshia (https://codepen.io/annastasshia/pen/YzpEajJ)

 Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


-->
</body>
</html>
