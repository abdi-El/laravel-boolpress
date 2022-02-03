<?php

use Illuminate\Database\Seeder;
use App\Category;
class Categories_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = ['Uncategorized'];
        foreach ($cats as $cat) {
            $new_category = new Category();
            $new_category->name = $cat;
            $new_category->save();
        }
    }
}
