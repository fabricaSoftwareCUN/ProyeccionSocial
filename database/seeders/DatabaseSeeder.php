<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\Load;
use App\Models\User;
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
    User::factory(1)->create();
    // Load::factory(200)->create();
    // Download::factory(20)->create();
  }
}
