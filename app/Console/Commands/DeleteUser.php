<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\text;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-user {username? : The username of the user to delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes users from the database.';

    protected $help = <<<'HELP'
        The <info>%command.name%</info> command deletes users from the database:

          <info>php %command.full_name%</info> <comment>username</comment>

        If you omit the argument, the command will ask you to
        provide the missing value:

          <info>php %command.full_name%</info>
        HELP;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->argument('username')) {
            $this->info('Delete User Command Interactive Wizard');
            $this->comment('If you prefer to not use this interactive wizard, provide the arguments required by this command as follows:');
            $this->newLine();
            $this->comment('$ php bin/console app:delete-user username');
            $this->newLine();
            $this->comment('Now we\'ll ask you for the value of all the missing command arguments.');
        }

        $username = $this->argument('username') ?? text('What is the username of the user you want to delete?');

        $user = User::where('username', $username)->first();

        if (!$user) {
            $this->error("User with username: {$username} does not exist.");

            return 1;
        }

        $userId = $user->id;
        $userUsername = $user->username;
        $userEmail = $user->email;

        $user->delete();

        $this->info(sprintf('User "%s" (ID: %d, email: %s) was successfully deleted.', $userUsername, $userId, $userEmail));

        Log::info("User with username: {$username}, email: {$userEmail}, and id: {$userId} has been deleted.");

        return 0;
    }
}
