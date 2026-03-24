<?php
function generatePortfolio($dir) {
    $files = glob($dir . "/*.jpg");
    $json = file_get_contents("data/datas.json");
    $data = json_decode($json, true);
    $text = $data["text_portfolio"];

    $chunks = array_chunk($files, 4);

    foreach ($chunks as $row_files) {
        echo '<div class="row">';
        
        foreach ($row_files as $file) {
            echo '<div class="col-25 portfolio text-white text-center" style="background-image: url(\'' . $file . '\');">';
            echo $text[basename($file)];
            echo '</div>';
        }

        echo '</div>';
    }
}
?>