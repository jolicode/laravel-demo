<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getUserData() as $userData) {
            DB::table('users')->insert([
                'name' => $userData[0],
                'username' => $userData[1],
                'password' => Hash::make($userData[2]),
                'email' => $userData[3],
                'roles' => json_encode($userData[4]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * @return array<array{string, string, string, string, array<string>}>
     */
    private function getUserData(): array
    {
        return [
            ['Jane Doe', 'jane_admin', 'kitten', 'jane_admin@symfony.com', [Role::ADMIN]],
            ['Tom Doe', 'tom_admin', 'kitten', 'tom_admin@symfony.com', [Role::ADMIN]],
            ['John Doe', 'john_user', 'kitten', 'john_user@symfony.com', [Role::USER]],
        ];
    }
}
