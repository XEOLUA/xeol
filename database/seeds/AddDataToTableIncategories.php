<?php

use App\Incategory;
use Illuminate\Database\Seeder;

class AddDataToTableIncategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'category_id'   => 1,
                    'lesson_id'    => 1,
                ],
                [
                    'category_id'   => 1,
                    'lesson_id'    => 2,
                ],
                [
                    'category_id'   => 1,
                    'lesson_id'    => 3,
                ],
                [
                    'category_id'   => 2,
                    'lesson_id'    => 1,
                ],
                [
                    'category_id'   => 3,
                    'lesson_id'    => 1,
                ],
                [
                    'category_id'   => 3,
                    'lesson_id'    => 2,
                ],
                [
                    'category_id'   => 4,
                    'lesson_id'    => 4,
                ],
                [
                    'category_id'   => 4,
                    'lesson_id'    => 7,
                ],
                [
                    'category_id'   => 5,
                    'lesson_id'    => 11,
                ],
                [
                    'category_id'   => 6,
                    'lesson_id'    => 12,
                ],
                [
                    'category_id'   => 7,
                    'lesson_id'    => 9,
                ],
            ];

        foreach ($data as $item){
            Incategory::insert([
                'category_id' => $item['category_id'],
                'lesson_id' => $item['lesson_id'],
            ]);
        }
    }
}
