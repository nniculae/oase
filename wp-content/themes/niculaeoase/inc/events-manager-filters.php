<?php 
// Events Manager
function eventManagerFilterContent($content)
{
    // $content .= "Here, I'm adding this extra text to the end of my event content.";

    return $content;
}
add_filter('em_content', 'eventManagerFilterContent');
