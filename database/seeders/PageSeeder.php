<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run()
    {
        // Profile Page
        Page::create([
            'title' => 'Profil Sekolah',
            'slug' => 'profil',
            'content' => '<h2>Profil SMK Palapa Semarang</h2>
            <p>SMK Palapa Semarang adalah sekolah menengah kejuruan yang berkomitmen untuk menghasilkan lulusan berkualitas yang siap kerja dan berdaya saing tinggi.</p>
            <h3>Visi</h3>
            <p>Menjadi lembaga pendidikan kejuruan terkemuka yang menghasilkan lulusan berkarakter, terampil, dan kompetitif di era global.</p>
            <h3>Misi</h3>
            <ul>
                <li>Menyelenggarakan pendidikan kejuruan yang berkualitas</li>
                <li>Mengembangkan kurikulum yang relevan dengan kebutuhan industri</li>
                <li>Membentuk karakter peserta didik yang religius dan berakhlak mulia</li>
                <li>Meningkatkan kualitas pendidik dan tenaga kependidikan</li>
                <li>Membangun kemitraan dengan dunia usaha dan industri</li>
            </ul>'
        ]);
    }
}
