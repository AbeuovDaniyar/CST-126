<?php
//a function that replaces a string with banned words with * and returns the filtered string
function wordFilter($text)
{
    $filter_terms = array('\bass(es|holes?)?\b', '\bshit(e|ted|ting|ty|head)\b',
    					  '\bfuck(e|ing|ed|head)\b');
    $filtered_text = $text;
    foreach($filter_terms as $word)
    {
        $match_count = preg_match_all('/' . $word . '/i', $text, $matches);
        for($i = 0; $i < $match_count; $i++)
            {
                $bwstr = trim($matches[0][$i]);
                $filtered_text = preg_replace('/\b' . $bwstr . '\b/', str_repeat("*", strlen($bwstr)), $filtered_text);
            }
    }
    return $filtered_text;
}
?>