<?php
/**
 * This function removes dates in various formats from a string.
 * Useful for scenarios like parsing podcast titles where dates are redundant.
 *
 * @param string $input The input string potentially containing a date.
 * @return string The input string with dates removed.
 */
function removeDate($input) {
    // Regular expression to match various date formats
    $patterns = [
        // YYYY-MM-DD, YYYY/MM/DD, YYYY.MM.DD
        '/\b\d{4}[\.\-\/][01]?\d[\.\-\/][0-3]?\d\b/',
        // Month DD, YYYY and Month DD YYYY
        '/\b(?:January|February|March|April|May|June|July|August|September|October|November|December)\s\d{1,2},?\s\d{4}\b/',
        // Mon DD, YYYY and Mon DD YYYY
        '/\b(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s\d{1,2},?\s\d{4}\b/',
        // DD Mon YYYY
        '/\b\d{1,2}\s(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s\d{4}\b/',
        // DD.MM.YYYY, DD-MM-YYYY, DD/MM/YYYY
        '/\b\d{1,2}[\.\-\/]\d{1,2}[\.\-\/]\d{2,4}\b/'
    ];
    
    // Remove matched date patterns
    $input = preg_replace($patterns, '', $input);
    
    // Optional: remove leading or trailing hyphens and colons left over from dates
    $input = trim($input, " \t\n\r\0\x0B-:");

    return $input;
}

// Example usage
echo removeDate("Podcast Title - March 15, 2023 - Some Other Text");
?>
