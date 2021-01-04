<?php
/**
 * PHP Replace Pattern within string
 *
 *
 * @author Simeon Adedokun <femsimade@gmail.com>
 * ====================================================
 * Created on 4th January, 2021
 *
*/


# Array of data to put in the string
$data = array(
	"Username" => "theusername",
	"Email" => "email@domain.com",
	"FirstName" => "Simeon",
	"LastName" => "Adedokun",
	"VerificationLink" => "https://example.com/verify/49Adfa94sfkaff3akfjsfksafj",
);


//Specify possible patterns (or words) that can be replaced; any pattern not listed will not be replaced
$replaceablePatterns = array("Username","Email","FirstName","LastName","VerificationLink","MiddleName","Address");

// Here is the string template with string patterns in it
$template = "
	Hello {FirstName} {LastName},<p>Your username is {Username}; your email address is {Email}. Click the link below to confirm your email address.<p>{VerificationLink}</p>
";


/* ******************************************************************************************** */

# Type 1

echo "<h2>Type 1</h2>";


foreach ($replaceablePatterns as $pattern) {
	$search_pattern = "{".$pattern."}";//Concatenating the curly brackets to make the word appear differently

	if(preg_match($search_pattern, $template))
	//use preg_replace(pattern, replacement, subject)
	$template = preg_replace($search_pattern, $data[$pattern], $template);
}

$template = str_replace("{", "", $template);
$template = str_replace("}", "", $template);

// You can now call the newly formed template
echo $template;


/* ******************************************************************************************** */

# Type 2

echo "<hr>";

echo "<h2>Type 2</h2>";

foreach ($replaceablePatterns as $pattern) {
	$search_pattern = "{".$pattern."}";//Concatenating the curly brackets
	if(strpos($template, $search_pattern))
		$template = str_replace($search_pattern, $data[$pattern], $template);
}

// You can now call the newly formed template
echo $template
?>