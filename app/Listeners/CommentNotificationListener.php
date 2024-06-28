<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\CommentCreatedEvent;
use App\Mail\CommentCreatedMail;
use Illuminate\Support\Facades\Mail;

class CommentNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(CommentCreatedEvent $event): void
    {
        $comment = $event->comment;

        $post = $comment->post;
        $author = $post->author;
        $email = $author->email;

        Mail::to($email)->send(new CommentCreatedMail(
            postTitle: $post->title,
            linkToPost: route('blog.post', $post),
        ));
    }
}
