<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('inbox', function($breadcrumbs)
{
	$breadcrumbs->parent('home');
    $breadcrumbs->push('Inbox', route('inbox'));
});

Breadcrumbs::register('search', function($breadcrumbs)
{
	$breadcrumbs->parent('home');
    $breadcrumbs->push('Search', route('search'));
});


Breadcrumbs::register('projects.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projects', route('projects.index'));
});

Breadcrumbs::register('tasks.index', function($breadcrumbs)
{
    $breadcrumbs->parent('projects.index');
    $breadcrumbs->push('Tasks', route('tasks.index'));
});