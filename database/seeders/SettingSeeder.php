<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert default settings into the settings table as key-value pairs
        $settings = [
            ['key' => 'footer_header', 'value' => 'Welcome to the Blood Bank'],
            ['key' => 'footer_paragraph', 'value' => 'We provide a platform for donating and requesting blood for those in need. Join us to save lives.'],
            ['key' => 'google_play_link', 'value' => 'https://play.google.com/store/apps/details?id=com.example.bloodbank'],
            ['key' => 'app_store_link', 'value' => 'https://apps.apple.com/us/app/blood-bank/id123456789'],
            ['key' => 'facebook_link', 'value' => 'https://www.facebook.com/bloodbank'],
            ['key' => 'instagram_link', 'value' => 'https://www.instagram.com/bloodbank'],
            ['key' => 'twitter_link', 'value' => 'https://twitter.com/bloodbank'],
            ['key' => 'whatsapp_link', 'value' => 'https://wa.me/123456789'],
            ['key' => 'contact_phone', 'value' => '+1234567890'],
            ['key' => 'contact_email', 'value' => 'contact@bloodbank.com'],
            ['key' => 'contact_fax', 'value' => '+1234567891'],
            ['key' => 'youtube_link', 'value' => 'https://www.youtube.com/c/bloodbank'],
            ['key' => 'google_link', 'value' => 'https://plus.google.com/bloodbank'],
            ['key' => 'about_us', 'value' => 'We are dedicated to providing blood for those in need. Our mission is to connect donors with those in need of blood donations. We believe that every donation can save a life. Join us and make a difference!'],
            ['key' => 'notification_settings_header', 'value' => 'Control the notifications you receive from our platform. Customize your preferences and stay informed about what matters to you.'],
            ['key' => 'intro_header', 'value' => 'Welcome to Our Blood Bank Platform'],
            ['key' => 'intro_body', 'value' => 'We connect donors with those in need of blood donations. Saving lives is our mission.'],
            ['key' => 'about_intro', 'value' => 'Join us to make a difference in people\'s lives through blood donation.'],
            ['key' => 'contact_header', 'value' => 'Get in Touch with Us'],
            ['key' => 'contact_body', 'value' => 'We are here to answer your questions and provide assistance. Contact us today.'],
        ];

        // Insert the settings into the database
        DB::table('settings')->insert($settings);
    }
}
