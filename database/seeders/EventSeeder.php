<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'id' => 1,
                'title' => 'LED ZEPPELIN',
                'image' => 'event-1.jpg',
                'date' => '2014-11-12',
                'start_time' => '19:00',
                'end_time' => '22:00',
                'location' => 'Kingswell | Los Angles',
                'organizer' => 'Music Events Inc.',
                'description' => 'Sebuah malam penuh energi dan nostalgia menanti Anda di Kingswell, Los Angeles, saat LED ZEPPELIN kembali menggetarkan panggung! Dengan suara khas yang telah merevolusi dunia musik rock, band legendaris ini siap membawakan deretan lagu ikonik yang pernah menjadi soundtrack hidup banyak generasi. Acara ini bukan hanya sekadar konser—ini adalah perayaan musik klasik yang telah membentuk sejarah. Mulai dari dentuman keras "Stairway to Heaven" hingga hentakan penuh semangat dari "Whole Lotta Love", bersiaplah untuk larut dalam atmosfer magis yang hanya bisa dihadirkan oleh LED ZEPPELIN. Tak hanya menyajikan penampilan spektakuler, konser ini juga akan diisi dengan pengalaman visual yang memukau dan tata suara kelas dunia. Hadir lebih awal, nikmati suasana, dan rasakan euforia bersama ribuan penggemar lainnya.',
            ],
            [
                'id' => 2,
                'title' => 'Jazz Night',
                'image' => 'event-2.jpg',
                'date' => '2025-10-15',
                'start_time' => '20:00',
                'end_time' => '23:00',
                'location' => 'Jazz Club | City Center',
                'organizer' => 'Jazz Lovers',
                'description' => 'Malam santai dengan iringan musik jazz klasik dan modern di jantung kota. Rasakan atmosfer hangat, pencahayaan remang, dan alunan saxophone yang menyentuh hati.',
            ],
            [
                'id' => 3,
                'title' => 'Pop Concert',
                'image' => 'event-3.jpg',
                'date' => '2025-11-05',
                'start_time' => '18:00',
                'end_time' => '21:00',
                'location' => 'Stadium | Downtown',
                'organizer' => 'Pop Nation',
                'description' => 'Nikmati penampilan bintang pop ternama dengan panggung megah dan pertunjukan cahaya spektakuler. Konser ini akan menghadirkan lagu-lagu hits yang membuat semua ikut bernyanyi.',
            ],
            [
                'id' => 4,
                'title' => 'Classical Evening',
                'image' => 'event-4.jpg',
                'date' => '2025-12-20',
                'start_time' => '19:30',
                'end_time' => '22:30',
                'location' => 'Opera House | Uptown',
                'organizer' => 'Classic Tunes Society',
                'description' => 'Sebuah malam yang penuh keanggunan dan kemewahan, dengan pertunjukan musik klasik dari komposer ternama dunia dalam suasana megah opera.',
            ],
            [
                'id' => 5,
                'title' => 'Hip Hop Battle',
                'image' => 'event-5.jpg',
                'date' => '2026-01-10',
                'start_time' => '20:00',
                'end_time' => '23:00',
                'location' => 'Arena | City Park',
                'organizer' => 'Urban Beats Crew',
                'description' => 'Pertarungan panas antar rapper lokal dan internasional! Beat menghentak, rima tajam, dan atmosfer penuh semangat dalam satu panggung.',
            ],
            [
                'id' => 6,
                'title' => 'Electronic Dance',
                'image' => 'event-6.jpg',
                'date' => '2026-02-25',
                'start_time' => '21:00',
                'end_time' => '02:00',
                'location' => 'Club XYZ | Beachside',
                'organizer' => 'Dance Nation',
                'description' => 'Rasakan hentakan musik EDM dari DJ ternama dunia di venue tepi pantai yang ikonik. Nikmati malam penuh tarian, lampu laser, dan vibes positif.',
            ],
            [
                'id' => 7,
                'title' => 'Indie Showcase',
                'image' => 'event-7.jpg',
                'date' => '2026-03-30',
                'start_time' => '17:00',
                'end_time' => '20:00',
                'location' => 'Theater | Old Town',
                'organizer' => 'Indie Vibes',
                'description' => 'Panggung untuk musisi independen berbakat yang membawa warna baru dalam dunia musik. Suasana hangat, musik segar, dan koneksi yang nyata dengan penonton.',
            ],
            [
                'id' => 8,
                'title' => 'Reggae Fest',
                'image' => 'event-8.jpg',
                'date' => '2026-04-15',
                'start_time' => '14:00',
                'end_time' => '20:00',
                'location' => 'Park | Riverside',
                'organizer' => 'Reggae Family',
                'description' => 'Hari penuh relaksasi dan semangat positif dengan musik reggae dari berbagai penjuru dunia. Nikmati alunan ritmis dan komunitas yang hangat.',
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->updateOrInsert(['id' => $event['id']], $event);
        }
    }
}
