<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Ensure the centralized settings row in `applications` exists.
     * This row powers branding, contact info, social links and the
     * admin-editable homepage statistics consumed via application().
     */
    public function run()
    {
        if (DB::table('applications')->count() === 0) {
            DB::table('applications')->insert([
                'site_name' => 'Ornab Cox\'s Bazar',
                'footer_text' => 'Ornab Cox\'s Bazar — Empowering communities and creating sustainable change in Bangladesh.',
                'copyright_text' => 'Copyright © ' . date('Y') . ' || All right reserved by Ornab Cox\'s Bazar',
                'contact_email' => 'info@ornabcxsbazar.org',
                'contact_phone' => '+880 0000-000000',
                'address' => 'Cox\'s Bazar, Bangladesh',
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'youtube' => 'https://youtube.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'statistics_donors' => 0,
                'statistics_beneficiaries' => 0,
                'statistics_projects' => 0,
                'statistics_volunteers' => 0,
                'spam_protection_enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
