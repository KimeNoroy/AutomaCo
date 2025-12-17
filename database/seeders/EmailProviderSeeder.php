<?php

namespace Database\Seeders;

use App\Models\EmailProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'google',
                'identifier' => 'google',
                'display_name' => 'Google (Gmail)',
            ],
            [
                'name' => 'outlook',
                'identifier' => 'outlook',
                'display_name' => 'Outlook (Microsoft)',
            ],
            [
                'name' => 'otro',
                'identifier' => 'other',
                'display_name' => 'Otro',
            ],
        ];

        foreach ($providers as $provider) {
            EmailProvider::firstOrCreate(
                ['name' => $provider['name']],
                $provider
            );
        }
    }
}
