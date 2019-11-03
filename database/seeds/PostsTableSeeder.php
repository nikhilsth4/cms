<?php

use App\Tag;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);

        $author1 = User::create([
            'name' => 'Ram Kc',
            'email' => 'ram@kc.com',
            'password' => Hash::make('password')
        ]);

        $author2 = User::create([
            'name' => 'Sita Kc',
            'email' => 'sita@kc.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr ',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies ',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr ',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg',
            'user_id' => $author2->id


        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example ',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr ',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'

        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank you to Marzyam for joining team ',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr ',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg',
            'user_id' => $author2->id


        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);
        $tag2 = Tag::create([
            'name' => 'customers'
        ]);
        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
