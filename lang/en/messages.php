<?php

return [
    'note' => 'NOTE',
    'tip' => 'TIP',
    'not_available' => 'Not available',
    'mit_license' => 'MIT License',
    'http_error' => [
        'name' => 'Error :status_code, number',
        'description' => 'There was an unknown error (HTTP :status_code, number) that prevented to complete your request.',
        'suggestion' => 'Try loading this page again in some minutes or <a href=":url">go back to the homepage</a>.',
        '403' => [
            'description' => "You don't have permission to access to this resource.",
            'suggestion' => 'Ask your manager or system administrator to grant you access to this resource.',
        ],
        '404' => [
            'description' => "We couldn't find the page you requested.",
            'suggestion' => 'Check out any misspelling in the URL or <a href=":url">go back to the homepage</a>.',
        ],
        '500' => [
            'description' => 'There was an internal server error.',
            'suggestion' => 'Try loading this page again in some minutes or <a href=":url">go back to the homepage</a>.',
        ],
    ],
    'title' => [
        'homepage' => 'Welcome to the <strong>Laravel Demo</strong> application',
        'source_code' => 'Source code used to render this page',
        'controller_code' => 'Controller code',
        'twig_template_code' => 'Twig template code',
        'login' => 'Secure Sign in',
        'post_list' => 'Post List',
        'edit_post' => 'Edit post #:id, number',
        'add_comment' => 'Add a comment',
        'comment_error' => 'There was an error publishing your comment',
        'edit_user' => 'Edit user',
        'change_password' => 'Change password',
    ],
    'action' => [
        'browse_app' => 'Browse application',
        'browse_admin' => 'Browse admin',
        'show' => 'Show',
        'show_post' => 'Show post',
        'show_code' => 'Show code',
        'edit' => 'Edit',
        'edit_post' => 'Edit post',
        'save' => 'Save changes',
        'delete_post' => 'Delete post',
        'create_post' => 'Create a new post',
    ],
    'delete_post_modal' => [
        'title' => 'Are you sure you want to delete this post?',
        'body' => 'This action cannot be undone.',
    ],
    'label' => [
        'delete_post' => 'Delete post',
        'cancel' => 'Cancel',
        'create_post' => 'Create post',
    ],
    'message' => [
        'post_created_successfully' => 'Post created successfully!',
        'post_updated_successfully' => 'Post updated successfully!',
        'post_deleted_successfully' => 'Post deleted successfully!',
    ],
    'post' => [
        'search_for' => 'Search for...',
        'search_no_results' => 'No results found',
    ],
    'user' => [
        'updated_successfully' => 'User updated successfully!',
    ],
    'notification' => [
        'comment_created' => 'Your post received a comment!',
        'comment_created.description' => 'Your post ":title" has received a new comment. You can read the comment by following <a href=":link">this link</a>',
    ],
    'help' => [
        'app_description' => 'This is a <strong>demo application</strong> built in the Laravel Framework to illustrate the recommended way of developing Laravel applications.',
        'show_code' => 'Click on this button to show the source code of the <strong>Controller</strong> and <strong>template</strong> used to render this page.',
        'browse_app' => 'Browse the <strong>public section</strong> of the demo application.',
        'browse_admin' => 'Browse the <strong>admin backend</strong> of the demo application.',
        'login_users' => 'Try either of the following users',
        'role_user' => 'regular user',
        'role_admin' => 'administrator',
        'reload_fixtures' => "If these users don't work, reload application fixtures by running this command from the terminal:",
        'add_user' => 'If you want to create new users, run this other command:',
        'more_information' => 'For more information, check out the <a href="https://laravel.com/doc">Laravel doc</a>.',
        'post_summary' => "Summaries can't contain Markdown or HTML contents; only plain text.",
        'post_publication' => 'Set the date in the future to schedule the blog post publication.',
        'post_content' => 'Use Markdown to format the blog post contents. HTML is allowed too.',
        'comment_content' => 'Comments not complying with our Code of Conduct will be moderated.',
    ],
    'info' => [
        'change_password' => 'After changing your password, you will be logged out of the application.',
    ],
    'rss' => [
        'title' => 'Laravel Demo blog',
        'description' => 'Most recent posts published on the Laravel Demo blog',
    ],
    'paginator' => [
        'previous' => 'Previous',
        'next' => 'Next',
        'current' => '(current)',
    ],
    'nav' => [
        'log_out' => 'Log out',
        'account' => 'Account',
        'login' => 'Log In',
        'search' => 'Search',
        'blog' => 'Blog',
        'backend' => 'Backend',
        'profile' => 'Profile',
        'post_list' => 'Post list',
    ],
];

