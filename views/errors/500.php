<?php 

// required context
$title = "Error 500";
$error_text = "500: Internal Server Error";

// call a template
$content_template = 'error.php';
require 'views/templates/dafault_template.php';
