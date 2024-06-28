<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserListMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public array $arrayUsers,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'test@example.org',
            subject: 'User List',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Not the cleanest, but this mail won't be used anywhere else in the demo
        $users = array_map(fn (array $user) => User::find($user[0]), $this->arrayUsers);

        return new Content(
            view: 'mails.user-list',
            with: ['users' => $users],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
