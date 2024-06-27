<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use App\Utils\Validator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\form;

use Symfony\Component\Stopwatch\Stopwatch;

use function Symfony\Component\String\u;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user
                            {username? : The username of the new user}
                            {password? : The plain password of the new user}
                            {email? : The email of the new user}
                            {full-name? : The full name of the new user}
                            {--A|admin : If set, the user is created as an administrator}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates users and stores them in the database.';

    protected $help = <<<'HELP'
        The <info>%command.name%</info> command creates new users and saves them in the database:

          <info>php %command.full_name%</info> <comment>username password email</comment>

        By default the command creates regular users. To create administrator users,
        add the <comment>--admin</comment> option:

          <info>php %command.full_name%</info> username password email <comment>--admin</comment>

        If you omit any of the three required arguments, the command will ask you to
        provide the missing values:

          # command will ask you for the email
          <info>php %command.full_name%</info> <comment>username password</comment>

          # command will ask you for the email and password
          <info>php %command.full_name%</info> <comment>username</comment>

          # command will ask you for all arguments
          <info>php %command.full_name%</info>
        HELP;

    public function __construct(private readonly Validator $validator)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (null === $this->argument('username')
            || null === $this->argument('password')
            || null === $this->argument('email')
            || null === $this->argument('full-name')
        ) {
            $this->info('Add User Command Interactive Wizard');
            $this->comment('
If you prefer to not use this interactive wizard, provide the arguments required by this command as follows:

$ php bin/console app:add-user username password email@example.com'
            );

            $this->newLine();
            $this->line('Now we\'ll ask you for the value of all the missing command arguments. You can correct a previous field with CTRL+U.');
        }

        $form = form();

        // Ask for the username if it's not defined
        /** @var string|null $username */
        $username = $this->argument('username');

        $this->newLine();

        if (null !== $username) {
            $this->line(' > <info>Username</info>: ' . $username);
        } else {
            $form->text(
                label: 'Username',
                required: true,
                validate: $this->validator->validateUsername(...),
                name: 'username'
            );
        }

        // Ask for the password if it's not defined
        /** @var string|null $password */
        $password = $this->argument('password');
        $this->newLine();

        if (null !== $password) {
            $this->line(' > <info>Password</info>: ' . u('*')->repeat(u($password)->length()));
        } else {
            $form->password(
                label: 'Password (your type will be hidden)',
                required: true,
                validate: $this->validator->validatePassword(...),
                name: 'password'
            );
        }

        // Ask for the email if it's not defined
        $email = $this->argument('email');
        $this->newLine();

        if (null !== $email) {
            $this->line(' > <info>Email</info>: ' . $email);
        } else {
            $form->text(
                label: 'Email',
                required: true,
                validate: $this->validator->validateEmail(...),
                name: 'email'
            );
        }

        // Ask for the full name if it's not defined
        $fullName = $this->argument('full-name');
        $this->newLine();

        if (null !== $fullName) {
            $this->line(' > <info>Full Name</info>: ' . $fullName);
        } else {
            $form->text(
                label: 'Full Name',
                required: true,
                validate: $this->validator->validateFullName(...),
                name: 'fullName'
            );
        }

        $responses = $form->submit();

        $stopwatch = new Stopwatch(); // Thank you Symfony
        $stopwatch->start('add-user-command');

        $this->newLine();
        $this->info('Creating user...');
        $this->newLine();

        $isAdministrator = $this->option('admin');

        // Realistically, using a form here is overkill, but it's a good example of how to use the Laravel Prompts package.
        try {
            $this->validator->validateUserData(
                $username ?? $responses['username'],
                $password ?? $responses['password'],
                $email ?? $responses['email'],
                $fullName ?? $responses['fullName']
            );
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());

            return 1;
        }

        $user = new User([
            'username' => $username ?? $responses['username'],
            'password' => Hash::make($password ?? $responses['password']),
            'email' => $email ?? $responses['email'],
            'name' => $fullName ?? $responses['fullName'],
            'roles' => $isAdministrator ? ['admin'] : ['user'],
        ]);

        $user->save();

        $this->info(sprintf('%s was successfully created: %s (%s)', $isAdministrator ? 'Administrator user' : 'User',
            $user->username, $user->email));

        $event = $stopwatch->stop('add-user-command');

        if ($this->output->isVerbose()) {
            $this->newLine();
            $this->comment(sprintf(
                'New user database id: %d / Elapsed time: %.2f ms / Consumed memory: %.2f MB',
                $user->id, $event->getDuration(), $event->getMemory() / (1024 ** 2))
            );
        }

        return 0;
    }
}
