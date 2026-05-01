<?php
function generatePortfolio($dir) {
    $files = glob($dir . "/*.jpg");
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $portfolio = $data["portfolio"];

    $chunks = array_chunk($files, 4);

    foreach ($chunks as $row_files) {
        echo '<div class="row">';
        
        foreach ($row_files as $file) {
            $filename = basename($file);
            $title = $portfolio[$filename]["title"];
            $url = $portfolio[$filename]["url"];

            echo '<div class="col-25 portfolio text-white text-center" style="background-image: url(\'' . $file . '\');">';
            echo '<a href="' . $url . '" target="_blank" style="color:white; text-decoration:none;">';
            echo '<h3>' . $title . '</h3>';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
    }
}
?>