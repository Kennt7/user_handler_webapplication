
<?php

if (isset($_GET["url"])) {
    $url = $_GET["url"];
    $content = file_get_contents($url);

    if ($content === false) {
        http_response_code(400);
        echo json_encode(array("error" => "Hiba történt az URL tartalmának letöltésekor."));
        exit;
    }

    $words = extractWordsWithA($content);
    echo json_encode(array("words" => $words));
    exit;
}

function extractWordsWithA($content)
{
    $words = array();
    $content = strip_tags($content); // Az oldal tartalmából eltávolítjuk az HTML elemeket.

    // A szavakat az "A" vagy "a" betűket tartalmazó szavakra szűrjük.
    preg_match_all('/\b\w*[aA]\w*\b/u', $content, $matches);

    // Maximum 64 szót listázunk ki.
    $words = array_slice($matches[0], 0, 64);

    // Egy találat csak egyszer szerepelhet az eredmények között.
    $words = array_unique($words);

    return $words;
}
?>
