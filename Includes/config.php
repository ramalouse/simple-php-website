<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'site_name' => 'Malouse.com',
        'site_url' => '',
        'pretty_uri' => false,
        'nav_menu' => [
            'home' => 'Home',
            'about-us' => 'About',
            'contact' => 'Contact',
            'robert' => 'Robert',
        ],
        'template_path' => 'template',
        'content_path' => 'Content',
        'version' => 'v1.1',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
