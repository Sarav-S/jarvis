<?php
$name = (isset($name)) ? $name : "home";
?>
{!! Breadcrumbs::render($name) !!}