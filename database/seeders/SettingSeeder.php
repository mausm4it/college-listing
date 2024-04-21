<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = new Setting();
        $settings->icon = "site_icon/favicon.svg";
        $settings->logo = "site_logo/logo.svg";
        $settings->name = "College Listing";
        $settings->about = "How Many College in Bangladesh";
        $settings->address = "134, Khonikaloy, Sabujbag 4th Len, Patuakhali sadar, Patuakhali";
        $settings->email = "masum4it@gmail.com";
        $settings->phone = "+880 17898 08879";
        $settings->meta_keywords = "college listing, universities, higher education, academic programs, campus life, faculty, student resources, admissions, college search, higher ed institutions";
        $settings->meta_description = "Discover top colleges and universities around the world. Compare programs, faculty, campus life, and more to find the perfect fit for your academic and career goals.";
        
       
        $settings->save();
    }
}
