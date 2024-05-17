<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alternatif;
use App\Models\Kos;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\LuasKamar;
use App\Models\NilaiUtility;
use App\Models\Nkriteria;
use App\Models\SubKriteria;
use App\Models\Tipe;
use App\Models\EndValue;
use App\Models\Fasilitas;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Kos::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        
        User::create([
            'name' => 'Lucky',
            'username' => 'Lucky',
            'is_admin' => '1',
            'email' => 'kurniantolucky9@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
        
        Fasilitas::Create([
            'keterangan'=>'Peralatan Tidur, Kamar Mandi Luar',
            'bobot'=> 1
        ]);

        Fasilitas::Create([
            'keterangan'=>'Peralatan Tidur, Meja/Lemari, Kamar Mandi Luar',
            'bobot'=> 2
        ]);
        
        Fasilitas::Create([
            'keterangan'=>'Peralatan Tidur, Meja/Lemari, Kamar Mandi dalam',
            'bobot'=> 3
        ]);

        Fasilitas::Create([
            'keterangan'=>'Peralatan Tidur, Meja/Lemari, Kamar Mandi dalam, Kipas Angin',
            'bobot'=> 4
        ]);

        Fasilitas::Create([
            'keterangan'=>'Peralatan Tidur, Meja/Lemari, Kamar Mandi dalam, AC',
            'bobot'=> 5
        ]);

        // ======= DATA KOS =======
        Kos::Create([
            'nama'=> 'Kost Nindy Residence Tipe B Sumbersari Jember 345NR',
            'harga'=> 750000,
            'fasilitas'=> 3,
            'jarak'=> 0.75,
            'luas_id'=> 3,
            'tipe_id'=> 2,
            'alamat'=> 'Jl. Batu Raden 1, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
        ]);
        Kos::Create([
            'nama'=> 'Kost Calyn Residence Sumbersari Jember 536CR',
            'harga'=> 425000,
            'fasilitas'=> 2,
            'jarak'=> 0.83,
            'luas_id'=> 3,
            'tipe_id'=> 2,
            'alamat'=> 'Jl. Mastrip No.1 No.63, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 66218',
        ]);
        Kos::Create([
            'nama'=> 'Kost Calysta Residence Sumbersari Jember 314CR',
            'harga'=> 425000,
            'fasilitas'=> 2,
            'jarak'=> 0.76,
            'luas_id'=> 3,
            'tipe_id'=> 2,
            'alamat'=> 'Jl. Mastrip Blk. H / Blk. I No.14, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
        ]);
        Kos::Create([
            'nama'=> 'Kost Gang Blora Sumbersari Jember',
            'harga'=> 350000,
            'fasilitas'=> 2,
            'jarak'=> 0.5,
            'luas_id'=> 4,
            'tipe_id'=> 1,
            'alamat'=> 'Gg. Blora No.28, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
        ]);
        Kos::Create([
            'nama'=> 'Kost Gilang Sumbersari Jember 882DMQW9',
            'harga'=> 350000,
            'fasilitas'=> 1,
            'jarak'=> 1.1,
            'luas_id'=> 3,
            'tipe_id'=> 1,
            'alamat'=> 'Gg. Sumur Bor No.49, Lingkungan Krajan Timur, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',
        ]);
        Alternatif::Create([
            'kos_id'=> 5,
            'harga'=> 350000,
            'fasilitas'=> 1,
            'jarak'=> 1.1,
            'luas'=> 3,
        ]);
        Alternatif::Create([
            'kos_id'=> 4,
            'harga'=> 350000,
            'fasilitas'=> 2,
            'jarak'=> 0.5,
            'luas'=> 4,
        ]);
        Alternatif::Create([
            'kos_id'=> 3,
            'harga'=> 425000,
            'fasilitas'=> 2,
            'jarak'=> 0.76,
            'luas'=> 3,
        ]);
        Alternatif::Create([
            'kos_id'=> 2,
            'harga'=> 425000,
            'fasilitas'=> 2,
            'jarak'=> 0.83,
            'luas'=> 3,
        ]);
        Alternatif::Create([
            'kos_id'=> 1,
            'harga'=> 750000,
            'fasilitas'=> 3,
            'jarak'=> 0.75,
            'luas'=> 3,
        ]);
    


        LuasKamar::create([
            'nama'=> '2 x 2',
        ]);
        LuasKamar::create([
            'nama'=> '3 x 2',
        ]);
        LuasKamar::create([
            'nama'=> '3 x 3',
        ]);
        LuasKamar::create([
            'nama'=> '4 x 3',
        ]);
        LuasKamar::create([
            'nama'=> '4 x 4',
        ]);

        Tipe::create([
            'nama'=> 'Pria'
        ]);
        Tipe::create([
            'nama'=> 'Wanita'
        ]);
        Kriteria::create([
            'nama' => 'harga',
            'bobot' => 40,
            'tipe' => 'cost',
            'normbobot'=> 0.4
        ]);
        Kriteria::create([
            'nama' => 'fasilitas',
            'bobot' => 40,
            'tipe' => 'benefit',
            'normbobot'=> 0.4
        ]);
        Kriteria::create([
            'nama' => 'jarak',
            'bobot' => 10,
            'tipe' => 'cost',
            'normbobot'=> 0.1
        ]);
        Kriteria::create([
            'nama' => 'luas',
            'bobot' => 10,
            'tipe' => 'benefit',
            'normbobot'=> 0.1
        ]);
        


    }
}
