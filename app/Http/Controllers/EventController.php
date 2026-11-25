<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    private $events = [
    [
        'id' => 1,
        'slug' => 'led-zeppelin',
        'title' => 'LED ZEPPELIN',
        'date' => '2014-11-12',
        'location' => 'Kingswell | Los Angles',
        'price' => 'From $135',
        'image' => 'event-1.jpg',
        'description' => 'Sebuah malam penuh energi dan nostalgia menanti Anda di Kingswell, Los Angeles, saat LED ZEPPELIN kembali menggetarkan panggung! Dengan suara khas yang telah merevolusi dunia musik rock, band legendaris ini siap membawakan deretan lagu ikonik yang pernah menjadi soundtrack hidup banyak generasi.

Acara ini bukan hanya sekadar konser—ini adalah perayaan musik klasik yang telah membentuk sejarah. Mulai dari dentuman keras "Stairway to Heaven" hingga hentakan penuh semangat dari "Whole Lotta Love", bersiaplah untuk larut dalam atmosfer magis yang hanya bisa dihadirkan oleh LED ZEPPELIN.

Tak hanya menyajikan penampilan spektakuler, konser ini juga akan diisi dengan pengalaman visual yang memukau dan tata suara kelas dunia. Hadir lebih awal, nikmati suasana, dan rasakan euforia bersama ribuan penggemar lainnya.',
        'start_time' => '19:00',
        'end_time' => '22:00',
        'organizer' => 'Music Events Inc.',
    ],
    [
        'id' => 2,
        'slug' => 'jazz-night',
        'title' => 'Jazz Night',
        'date' => '2025-10-15',
        'location' => 'Jazz Club | City Center',
        'price' => 'From $150',
        'image' => 'event-2.jpg',
        'description' => 'Malam santai dengan iringan musik jazz klasik dan modern di jantung kota. Rasakan atmosfer hangat, pencahayaan remang, dan alunan saxophone yang menyentuh hati.',
        'start_time' => '20:00',
        'end_time' => '23:00',
        'organizer' => 'Jazz Lovers',
    ],
    [
        'id' => 3,
        'slug' => 'pop-concert',
        'title' => 'Pop Concert',
        'date' => '2025-11-05',
        'location' => 'Stadium | Downtown',
        'price' => 'From $200',
        'image' => 'event-3.jpg',
        'description' => 'Nikmati penampilan bintang pop ternama dengan panggung megah dan pertunjukan cahaya spektakuler. Konser ini akan menghadirkan lagu-lagu hits yang membuat semua ikut bernyanyi.',
        'start_time' => '18:00',
        'end_time' => '21:00',
        'organizer' => 'Pop Nation',
    ],
    [
        'id' => 4,
        'slug' => 'classical-evening',
        'title' => 'Classical Evening',
        'date' => '2025-12-20',
        'location' => 'Opera House | Uptown',
        'price' => 'From $180',
        'image' => 'event-4.jpg',
        'description' => 'Sebuah malam yang penuh keanggunan dan kemewahan, dengan pertunjukan musik klasik dari komposer ternama dunia dalam suasana megah opera.',
        'start_time' => '19:30',
        'end_time' => '22:30',
        'organizer' => 'Classic Tunes Society',
    ],
    [
        'id' => 5,
        'slug' => 'hip-hop-battle',
        'title' => 'Hip Hop Battle',
        'date' => '2026-01-10',
        'location' => 'Arena | City Park',
        'price' => 'From $120',
        'image' => 'event-5.jpg',
        'description' => 'Pertarungan panas antar rapper lokal dan internasional! Beat menghentak, rima tajam, dan atmosfer penuh semangat dalam satu panggung.',
        'start_time' => '20:00',
        'end_time' => '23:00',
        'organizer' => 'Urban Beats Crew',
    ],
    [
        'id' => 6,
        'slug' => 'electronic-dance',
        'title' => 'Electronic Dance',
        'date' => '2026-02-25',
        'location' => 'Club XYZ | Beachside',
        'price' => 'From $160',
        'image' => 'event-6.jpg',
        'description' => 'Rasakan hentakan musik EDM dari DJ ternama dunia di venue tepi pantai yang ikonik. Nikmati malam penuh tarian, lampu laser, dan vibes positif.',
        'start_time' => '21:00',
        'end_time' => '02:00',
        'organizer' => 'Dance Nation',
    ],
    [
        'id' => 7,
        'slug' => 'indie-showcase',
        'title' => 'Indie Showcase',
        'date' => '2026-03-30',
        'location' => 'Theater | Old Town',
        'price' => 'From $140',
        'image' => 'event-7.jpg',
        'description' => 'Panggung untuk musisi independen berbakat yang membawa warna baru dalam dunia musik. Suasana hangat, musik segar, dan koneksi yang nyata dengan penonton.',
        'start_time' => '17:00',
        'end_time' => '20:00',
        'organizer' => 'Indie Vibes',
    ],
    [
        'id' => 8,
        'slug' => 'reggae-fest',
        'title' => 'Reggae Fest',
        'date' => '2026-04-15',
        'location' => 'Park | Riverside',
        'price' => 'From $130',
        'image' => 'event-8.jpg',
        'description' => 'Hari penuh relaksasi dan semangat positif dengan musik reggae dari berbagai penjuru dunia. Nikmati alunan ritmis dan komunitas yang hangat.',
        'start_time' => '14:00',
        'end_time' => '20:00',
        'organizer' => 'Reggae Family',
    ],
];


    public function showById($id)
    {
        $event = collect($this->events)->firstWhere('id', (int)$id);
        if (!$event) {
            abort(404);
        }
        $event['time'] = $event['start_time'] . ' - ' . $event['end_time'];
        return view('event.event-detail', ['event' => $event]);
    }

    public function showBySlug($slug)
    {
        $event = collect($this->events)->firstWhere('slug', $slug);
        if (!$event) {
            abort(404);
        }
        $event['time'] = $event['start_time'] . ' - ' . $event['end_time'];
        return view('event.event-detail', ['event' => $event]);
    }

    public function show($slug)
    {
        return $this->showBySlug($slug);
    }

    public function checkout(Request $request, $id)
    {
        $event = collect($this->events)->firstWhere('id', (int)$id);

        $subtotal = $request->query('subtotal', 0);
        $tickets = $request->query('tickets', 0);
        $tax = $request->query('tax', 1);
        $total = $request->query('total', 0);
        $detail = $request->query('detail', '');

        // Parse detail jadi array: [ 'Pre sale' => 1, 'VIP' => 2 ]
        $ticketItems = [];
        if ($detail) {
            $items = explode(',', $detail);
            foreach ($items as $item) {
                [$title, $qty] = explode(':', $item);
                $ticketItems[$title] = (int) $qty;
            }
        }

        return view('event.event-checkout', compact('event', 'subtotal', 'tickets', 'tax', 'total', 'ticketItems'));
    }

    public function checkoutPost(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $user = $request->user();
        $userId = null;
        $exists = false;

        if ($user) {
            // Verify user exists in users table
            $exists = \App\Models\User::where('id', $user->id)->exists();
            if ($exists) {
                $userId = $user->id;
            }
        }

        \Log::info('CheckoutPost userId: ' . ($userId ?? 'null') . ', exists: ' . ($exists ? 'true' : 'false'));

        \App\Models\Transaction::create([
            'event_id' => $id,
            'user_id' => $userId,
            'quantity' => $request->input('quantity'),
            'total_price' => $request->input('total_price'),
        ]);

        return redirect()->route('event.detail.id', ['id' => $id])->with('success', 'Transaction completed successfully.');
    }
}
