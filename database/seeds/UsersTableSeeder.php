<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //0
        $users=factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());
       
        $user=User::find(1);
        $user->name='admin';
        $user->email='123@123.com';
        $user->password=bcrypt('admin');
        $user->is_admin=true;
        $user->save();
    }
}
