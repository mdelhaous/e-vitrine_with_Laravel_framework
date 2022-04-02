<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
 // Role comes before User seeder here.
 $this->call(RoleTableSeeder::class);
 // User seeder will use the roles above created.
 $this->call(UserTableSeeder::class);
}
/**
* @param string|array $roles
*/
public function authorizeRoles($roles)
{
 if (is_array($roles)) {
 return $this->hasAnyRole($roles) ||
 abort(401, 'This action is unauthorized.');
 }
 return $this->hasRole($roles) ||
 abort(401, 'This action is unauthorized.');
}
/**
* Check multiple roles
* @param array $roles
*/
public function hasAnyRole($roles)
{
 return null !== $this->roles()->whereIn('name', $roles)->first();
}
/**
* Check one role
* @param string $role
*/
public function hasRole($role)
{
 return null !== $this->roles()->where('name', $role)->first();
}

}
