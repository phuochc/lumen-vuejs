<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/27/2019
 * Time: 9:55 AM
 */
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class, 50)->create();
    }
}
