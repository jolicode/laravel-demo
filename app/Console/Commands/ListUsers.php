<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Mail\UserListMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ListUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-users {max-results=50 : The maximum number of users to display} {send-to? : If set, the result is sent to the given email address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists all the existing users';

    protected $aliases = ['app:users'];

    protected $help = <<<'HELP'
        The <info>%command.name%</info> command lists all the users registered in the application:

          <info>php %command.full_name%</info>

        By default the command only displays the 50 most recent users. Set the number of
        results to display with the <comment>--max-results</comment> option:

          <info>php %command.full_name%</info> <comment>--max-results=2000</comment>

        In addition to displaying the user list, you can also send this information to
        the email address specified in the <comment>--send-to</comment> option:

          <info>php %command.full_name%</info> <comment>--send-to=fabien@symfony.com</comment>
        HELP;

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        /** @var int|null $maxResults */
        $maxResults = filter_var($this->argument('max-results'), \FILTER_VALIDATE_INT);

        if (!$maxResults) {
            $maxResults = 50;
        }

        $allUsers = User::query()
            ->orderBy('id', 'desc')
            ->limit($maxResults)
            ->get()
        ;

        $createUserArray = static function (User $user): array {
            return [
                $user->id,
                $user->name,
                $user->username,
                $user->email,
                $user->isAdmin() ? 'Yes' : 'No',
            ];
        };

        $users = $allUsers->map($createUserArray)->toArray();

        $headers = ['ID', 'Name', 'Username', 'Email', 'Admin'];

        $this->table($headers, $users);

        $sendTo = $this->argument('send-to');

        if ($sendTo) {
            $this->info("Sending the user list to: {$sendTo}");
            Mail::to($sendTo)->send(new UserListMail($users));
        }

        return 0;
    }
}
