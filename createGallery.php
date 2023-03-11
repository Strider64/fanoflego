<?php
require_once 'assets/config/config.php';
require_once "vendor/autoload.php";
use FanOfLEGO\Login;
use FanOfLEGO\Gallery;
use FanOfLEGO\Resize;

$user = new Login();
if (!$user::adminCheck()) {
    header('Location: index.php');
    exit();
}
$save_result = false;

if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_FILES['image'])) {
    $data = $_POST['gallery'];
    $errors = array();
    $exif_data = [];
    $file_name = $_FILES['image']['name']; // Temporary file for thumbnails directory:
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $thumb_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    /*
     * Set EXIF data info of image for database table that is
     * if it contains the info otherwise set to null.
     */
    if ($file_ext === 'jpeg' || $file_ext === 'jpg') {
        /*
         * I don't like suppressing errors, but this
         * is the only way that I can so
         * until find out how to do it this will
         * have to do.
         */
        $exif_data = @exif_read_data($file_tmp);

        //echo intval($exif_data['FocalLength']) . "<br>";
        //echo "<pre>" . print_r($exif_data, 1) . "</pre>";
        //die();
        if (array_key_exists('Make', $exif_data) && array_key_exists('Model', $exif_data)) {
            $data['Model'] = $exif_data['Make'] . ' ' . $exif_data['Model'];
        }

        if (array_key_exists('ExposureTime', $exif_data)) {
            $data['ExposureTime'] = $exif_data['ExposureTime'] . "s";
        }

        if (array_key_exists('ApertureFNumber', $exif_data['COMPUTED'])) {
            $data['Aperture'] = $exif_data['COMPUTED']['ApertureFNumber'];
        }

        if (array_key_exists('ISOSpeedRatings', $exif_data)) {
            $data['ISO'] = "ISO " . $exif_data['ISOSpeedRatings'];
        }

        if (array_key_exists('FocalLengthIn35mmFilm', $exif_data)) {
            $data['FocalLength'] = $exif_data['FocalLengthIn35mmFilm'] . "mm";
        }

    } else {
        $data['Model'] = null;
        $data['ExposureTime'] = null;
        $data['Aperture'] = null;
        $data['ISO'] = null;
        $data['FocalLength'] = null;
    }

    $data['content'] = trim($data['content']);

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions, true) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size >= 44040192) {
        $errors[] = 'File size must be less than or equal to 42 MB';
    }



    /*
     * Create unique name for image.
     */
    $image_path = 'assets/image_path/img-gallery-' . time() . '-2048x1365' . '.' . $file_ext;
    $thumb_path = 'assets/thumb_path/thumb-gallery-' . time() . '-205x137' . '.' . $file_ext;

    move_uploaded_file($file_tmp, $image_path);
    move_uploaded_file($thumb_tmp, $thumb_path);

    $resize = new Resize($image_path);
    $resize->resizeImage(2048, 1365, 'landscape');
    $resize->saveImage($image_path, 100);




    $resize->resizeImage(205, 137, 'auto');
    $resize->saveImage($thumb_path, 100);

    try {
        $today = $todayDate = new DateTime('today', new DateTimeZone("America/Detroit"));
    } catch (Exception $e) {
    }
    $data['date_updated'] = $data['date_added'] = $today->format("Y-m-d H:i:s");

    $data['image_path'] = $image_path;
    $data['thumb_path'] = $thumb_path;


    /*
     * If no errors save ALL the information to the
     * database table.
     */
    if (empty($errors) === true) {
        /* Save to Database Table CMS */
        try {
            $today = $todayDate = new DateTime('today', new DateTimeZone("America/Detroit"));
        } catch (Exception $e) {
        }
        $data['date_updated'] = $data['date_added'] = $today->format("Y-m-d H:i:s");
        $gallery = new Gallery($data);
        $result = $gallery->create();
        if ($result) {
            header("Location: admin.php");
            exit();
        }
    } else {
        return $errors;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <title>Insert Images</title>
    <link rel="stylesheet" media="all" href="assets/css/styles.css">
</head>
<body class="site">
<header class="headerStyle">

</header>
<?php include_once 'assets/includes/inc.trivia.nav.php'; ?>
<section class="main">
    <form id="formData" class="checkStyle" action="createGallery.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="gallery[user_id]" value="<?= $_SESSION['id'] ?>">
        <input type="hidden" name="gallery[author]" value="<?= Login::full_name() ?>">
        <input type="hidden" name="gallery[page]" value="gallery">
        <input type="hidden" name="action" value="upload">
        <div class="file-style">
            <input id="file" class="file-input-style" type="file" name="image">
            <label for="file">Select file</label>
        </div>
        <label>
            <select class="select-css" name="gallery[category]">
                <option selected disabled>Select a Category</option>
                <option value="general" selected>General</option>
                <option value="lego">LEGO</option>
                <option value="halloween">Halloween</option>
                <option value="landscape">Landscape</option>
                <option value="wildlife">Wildlife</option>
            </select>
        </label>
        <div class="heading-style">
            <label class="heading_label_style" for="heading">Heading</label>
            <input class="enter_input_style" id="heading" type="text" name="gallery[heading]" value="" tabindex="1" required
                   autofocus>
        </div>
        <div class="content-style">
            <label class="text_label_style" for="content">Content</label>
            <textarea class="text_input_style" id="content" name="gallery[content]" tabindex="2"></textarea>
        </div>
        <div class="submit-button">
            <button class="form-button" type="submit" name="submit" value="enter">submit</button>
        </div>
    </form>
</section>
<?php include "assets/includes/inc.sidebar.php" ?>
<?php include 'assets/includes/inc.footer.php'; ?>
</body>
</html>
