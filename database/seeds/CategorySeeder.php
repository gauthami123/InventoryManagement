<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $categories = [ 
            [ 
              'category_name' => 'Shoes',
              'slug' => 'shoes'
             
            ],
            [
              'category_name' => 'Shirts',
              'slug' => 'shirts'
            ],
			 [
              'category_name' => 'Belts',
              'slug' => 'belts'
            ]
          ];

          foreach($categories as $category)
          {
              Category::create([
               'category_name' => $category['category_name'],
               'slug' => $category['slug']
             ]);
           }
    }
}
