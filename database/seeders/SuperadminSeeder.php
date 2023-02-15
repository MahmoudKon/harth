<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SuperadminSeeder extends Seeder
{
    use UploadFile;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = $this->GetApiImage('people', 1);

        $data = [
            'name'                  => 'super_admin',
            'email'                 => 'super_admin@app.com',
            'password'              => 123,
            'email_verified_at'     => now(),
            'remember_token'        => Str::random(10),
            'image'                 => $this->uploadApiImage($images[0]['src']['medium'], 'users'),
            'phone'                 => '011',
            'fingerprint'           => '011',
            'gender'                => '011',
            'verfied'               => '011',
            'trusted'               => true,
            'password_payments'     => '011',
            'balance'               => '011',
            'vf_code'               => '011',
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Department::get()->each(function($row) use($user) {
            $row->update(['manager_id' => $user->id]);
        });
        $user->assignRole('Super Admin');
    }
}
