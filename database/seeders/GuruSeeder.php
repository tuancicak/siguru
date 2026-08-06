<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $gurus = [
            [
                'name' => 'Budi',
                'email' => 'budi@siguru.sch.id',
                'nip' => '198001010001',
                'jabatan' => 'Guru Matematika',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'name' => 'Asih',
                'email' => 'asih@siguru.sch.id',
                'nip' => '198001010002',
                'jabatan' => 'Guru Bahasa Indonesia',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'name' => 'Alip',
                'email' => 'alip@siguru.sch.id',
                'nip' => '198001010003',
                'jabatan' => 'Guru IPA',
                'jenis_kelamin' => 'Laki-laki',
            ],
        ];

        foreach ($gurus as $data) {

            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('guru123'),
                    'role' => 'guru',
                ]
            );

            Guru::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nip' => $data['nip'],
                    'nama' => $data['name'],
                    'jabatan' => $data['jabatan'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'alamat' => '-',
                    'no_hp' => '-',
                ]
            );
        }
    }
}
