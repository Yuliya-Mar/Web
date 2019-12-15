<?php

include ('simple_html_dom.php');

$htmlcode = file_get_html('top.php');

$html = str_get_html($htmlcode);

$toc = '';
$last_level = 0;

foreach ($html -> find('h1,h2,h3,h4,h5,h6') as $h) {
	$text = trim($h->innertext); 
	$id = str_replace(' ', '_', $text); 
	$h->id = $id; 
	$level = intval($h->tag[1]); 

	if ($level > $last_level) {
		$toc .= "<ul>";
	} else {
		$toc .= str_repeat('</li></ul>', $last_level - $level);
		$toc .= '</li>';
	}

	$toc .= "<li><a href='#{$id}'>{$text}</a>";

	$last_level = $level;
}

$toc .= str_repeat('</li></ul>', $last_level);

echo $toc;

?>