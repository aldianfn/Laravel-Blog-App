<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        User::create([
            'name' => 'Aldian FN',
            'username' => 'aldianfn',
            'email' => 'aldianfn@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Post::factory(20)->create();



        // User::create([
        //     'name' => 'Andi B',
        //     'email' => 'andibudi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);   

        // Post::create([
        //     'title' => 'First post',
        //     'slug' => 'first-post',
        //     'excerpt' => 'First post details ...',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aperiam dolorem quos necessitatibus ipsam debitis nisi quasi, animi nostrum totam corrupti at cum. Saepe, cumque.</p><p>Vitae enim soluta delectus quod iure est magnam impedit accusamus facere, consequatur tenetur distinctio molestias expedita corrupti, modi voluptate cumque. Aperiam, neque eos? Optio, ipsa itaque. Expedita, alias aliquam. Autem odio aut eum doloribus animi. Eius, veniam rem iure maiores non tenetur. Iste sequi delectus explicabo alias tenetur hic assumenda possimus dicta, quia, natus commodi!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Second post',
        //     'slug' => 'second-post',
        //     'excerpt' => 'Second post details ...',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aperiam dolorem quos necessitatibus ipsam debitis nisi quasi, animi nostrum totam corrupti at cum. Saepe, cumque.</p><p>Vitae enim soluta delectus quod iure est magnam impedit accusamus facere, consequatur tenetur distinctio molestias expedita corrupti, modi voluptate cumque. Aperiam, neque eos? Optio, ipsa itaque. Expedita, alias aliquam. Autem odio aut eum doloribus animi. Eius, veniam rem iure maiores non tenetur. Iste sequi delectus explicabo alias tenetur hic assumenda possimus dicta, quia, natus commodi!</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Third post',
        //     'slug' => 'third-post',
        //     'excerpt' => 'Third post details ...',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aperiam dolorem quos necessitatibus ipsam debitis nisi quasi, animi nostrum totam corrupti at cum. Saepe, cumque.</p><p>Vitae enim soluta delectus quod iure est magnam impedit accusamus facere, consequatur tenetur distinctio molestias expedita corrupti, modi voluptate cumque. Aperiam, neque eos? Optio, ipsa itaque. Expedita, alias aliquam. Autem odio aut eum doloribus animi. Eius, veniam rem iure maiores non tenetur. Iste sequi delectus explicabo alias tenetur hic assumenda possimus dicta, quia, natus commodi!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
    }
}
