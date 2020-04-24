<?php

use App\Category;
use Illuminate\Database\Seeder;

class AddDataToTableCategories extends Seeder
{
public function run()
{
    $data =
        [
            [
                'parent_id' => '0',
                'title'   => 'Комп\'ютерна графіка',
                'description'    => 'Растрова, векторна, 3D графіка',
                'order'   => 0,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Текстовий процесор',
                'description'    => 'Форматування, списки, таблиці, формули, стилі, шаблони',
                'order'   => 1,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Операційна система',
                'description'    => 'Робота з файловою системою, пошук, налаштування',
                'order'   => 2,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Калькулятор',
                'description'    => 'Обчислення із використанням ф-цій та пам\'яті',
                'order'   => 3,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Табличний процесор',
                'description'    => 'Обробка масивів даних, діаграми, елементи керування, аналіз даних, задачі оптимізації',
                'order'   => 4,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Бази даних/СКБД',
                'description'    => 'Проектування, перрвинна та вторинна обробки даних, форми, звіти',
                'order'   => 5,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Комп\'ютерні презентації',
                'description'    => 'Анімація, дія при наведенні, тригери',
                'order'   => 6,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Навчальне ПЗ',
                'description'    => 'Програмне забезпечення навчально призначення, математика',
                'order'   => 7,
            ],
            [
                'parent_id' => '0',
                'title'   => 'Алгоритми',
                'description'    => 'Основи прграмування, мова C/C++, C#, Scratch',
                'order'   => 8,
            ],
            [
                'parent_id' => '0',
                'title'   => 'WEB',
                'description'    => 'HTML, CSS, JavaScript',
                'order'   => 9,
            ],
        ];

    foreach ($data as $item){
        Category::insert([
            'parent_id' => $item['parent_id'],
            'title' => $item['title'],
            'description' => $item['description'],
            'order' => $item['order'],
        ]);
    }
}
}
