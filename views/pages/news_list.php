<?php

// global settings
use App\Controllers\News;


// required data
$title = "All news";
$news_array = News::all();


// call a template
$content_template = "news_list.php";
require 'views/templates/dafault_template.php';
