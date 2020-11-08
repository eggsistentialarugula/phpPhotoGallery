<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='simplelightbox-master/dist/simplelightbox.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-3.0.0.js' type='text/javascript'></script> 
    <script type="text/javascript" src="simplelightbox-master/dist/simple-lightbox.js"></script>
    
    <link href='style.css' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Begin Navbar -->
    <nav>
        <ul class = "links">
            <li>
                <a id = "" href="index.php">Beach</a>
            </li>
            <li>
                <!-- Family History Highlights  -->
                <a href="mountains.php">Mountains</a>
            </li>
            <li>
                <!-- Family Record -->
                <a href="valley.php">Valley</a>
            </li>
            <li>
                <!-- B & W Photo Scans -->
                <a href="ocean.php">Oceans</a>
            </li>
                
            <li>
                <!-- Recent Photos -->
                <a href="forest.php">Forests</a>
            </li>
        </ul>
        
        <div class="burger">
            <div class = "line1"></div>
            <div class = "line2"></div>
            <div class = "line3"></div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class='container'>
                <div class="gallery">
                
                <?php 
                // Image extensions
                $image_extensions = array("png","jpg","jpeg","gif");

                // Target directory
                $dir = 'forestImgs/';
                if (is_dir($dir)){
                    
                    if ($dh = opendir($dir)){
                        $count = 1;

                        // Read files
                        while (($file = readdir($dh)) !== false){

                            if($file != '' && $file != '.' && $file != '..'){
                                
                                // Thumbnail image path
                                $thumbnail_path = "forestImgs/thumbnail/".$file;

                                // Image path
                                $image_path = "forestImgs/".$file;
                                
                                $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
                                $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

                                // Check that it's an image file and not a folder
                                if(!is_dir($image_path) && 
                                    in_array($thumbnail_ext,$image_extensions) && 
                                    in_array($image_ext,$image_extensions)){
                                    ?>

                                    <!-- Image -->
                                    <a href="<?php echo $image_path; ?>">
                                        <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
                                    </a>
                                    <!-- --- -->
                                    <?php

                                    // Break
                                    if( $count%4 == 0){
                                    ?>
                                        <div class="clear"></div>
                                    <?php    
                                    }
                                    $count++;
                                }
                            }
                                
                        }
                        closedir($dh);
                    }
                }
                ?>
                </div>
            </div>


            <!-- Script -->
            <script type='text/javascript'>

            $(document).ready(function(){
                // Intialize gallery
                var gallery = $('.gallery a').simpleLightbox();
            });
            </script>
    
</body>
</html>

    
    
        
