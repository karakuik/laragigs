<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User; //For User factory so no need for the ::
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users
        //User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id'=>$user->id
        ]);

//         Listing::create([
//             'title' => 'Laravel Senior Developer',
//             'tags' => 'laravel, javascript',
//             'company' => 'Acme Corp',
//             'location' => 'Boston, MA',
//             'email' => 'email1@email.com',
//             'website' => 'https://www.acme.com',
//             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
//         ]);
//
//         Listing::create([
//             'title' => 'Full-Stack Engineer',
//             'tags' => 'laravel, backend ,api',
//             'company' => 'Stark Industries',
//             'location' => 'New York, NY',
//             'email' => 'email2@email.com',
//             'website' => 'https://www.starkindustries.com',
//             'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
//         ]);

//        Listing::factory(6)->create();

        // Create Users
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
