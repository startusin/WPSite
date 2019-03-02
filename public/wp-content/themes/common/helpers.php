<?php
function get_reading_time($content) {
    $minutes = floor( str_word_count(strip_tags($content)) / 200);
    return (int)$minutes === 0 ? "less that 1 min." : "about {$minutes} min.";
}
