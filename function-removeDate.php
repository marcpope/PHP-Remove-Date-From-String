<?php
/*

this is not perfect, but this code will remove dates from a string. Useful for parsing podcasts
where there is already a publish date inside the XML code and the title does not need a date.

*/

function removeDate($input) {
	$input = preg_replace('/(\d{4}[\.\/\-][01]\d[\.\/\-][0-3]\d)/', '', $input);
	$input = preg_replace('/(January|February|March|April|May|June|July|August|September|October|November|December) \d{1,2}, \d{4}/', '', $input); 
	$input = preg_replace('/(January|February|March|April|May|June|July|August|September|October|November|December) \d{1,2} \d{4}/', '', $input); 
	$input = preg_replace('/(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) \d{1,2}, \d{4}/', '', $input); 
	$input = preg_replace('/(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) \d{1,2} \d{4}/', '', $input); 

	$input = preg_replace('/\d{1,2} (Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) \d{4}/', '', $input); 

	$input = preg_replace('(\d{1,2}\.\d{2}\.\d{4})', '', $input);
	$input = preg_replace('(\d{1,2}\.\d{2}\.\d{2})', '', $input);
	$input = preg_replace('(\d{1,2}\-\d{2}\-\d{4})', '', $input);
	$input = preg_replace('(\d{1,2}\-\d{2}\-\d{2})', '', $input);
	
/*
this part is optional, it removes hyphens and colons in the beginning or end of the string
in a title that are left over from the author that had added a date in a title
  */
  
  $input = trim($input);
	$input = trim($input,'-');
  $input = trim($input,'-');
	$input = trim($input);
	
	return($input);
	
}
