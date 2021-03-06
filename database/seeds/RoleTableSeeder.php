<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if (App::environment() === 'production') {
        exit('I just stopped you getting fired. Love, Amo.');
      }
      DB::table('role')->truncate();

      Role::create([
        'id'            => 1,
        'name'          => 'Administrator',
        'description'   => 'Full access to the System'
      ]);
      Role::create([
        'id'            => 2,
        'name'          => 'Manager',
        'description'   => 'Manage Leaves, Overtime and many more'
      ]);
      Role::create([
        'id'            => 3,
        'name'          => 'User',
        'description'   => 'A standard user that can have a licence assigned to them. No administrative features.'
      ]);
    }
}
