<?php

namespace App\Http\Sections;

use AdminColumnEditable;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnFilter;
use App\Category;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Form\Columns\Column;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;

/**
 * Class Lessons
 *
 * @property \App\Lesson $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Lessons extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title="Уроки";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(100)->setIcon('fas fa-chalkboard-teacher');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {

        $categories=Category::select('id','title')->get()->pluck('title','id')->toArray();
//        $category = Category::find([3, 4]);
//        $product->categories()->attach($category);

        $columns = [
            AdminColumn::text('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumnEditable::text('title')->setLabel('Заголовок'),
            AdminColumn::count('relLessonToIncategory', 'В категоріях')->setWidth('130px')->setHtmlAttribute('align','center'),
            AdminColumn::lists('relLessonToCategory.title', 'Категорії'),
            AdminColumnEditable::text('level','Складність')->setWidth('100px')->setHtmlAttribute('align','center'),
            AdminColumnEditable::text('author','Автор')->setWidth('100px'),
            AdminColumn::text('view','Переглядів')->setWidth('110px')->setHtmlAttribute('align','center'),
            AdminColumn::image('image','Зображення')->setWidth('110px'),
            AdminColumnEditable::checkbox('solution',"Пояснення")->setWidth('150px')->setCheckedLabel('Так')->setHtmlAttribute('align','center'),
            AdminColumn::text('created_at', 'Created / updated', 'updated_at')
                ->setWidth('160px')
                ->setOrderable(function($query, $direction) {
                    $query->orderBy('updated_at', $direction);
                })
                ->setSearchable(false)
            ,
        ];

        $display = AdminDisplay::datatables()
            ->setName('firstdatatables')
            ->setOrder([[0, 'asc']])
            ->setDisplaySearch(true)
            ->paginate(25)
            ->setColumns($columns)
            ->setHtmlAttribute('class', 'table-primary table-hover th-center')
        ;

        $display->setColumnFilters([
            AdminColumnFilter::select()
                ->setModelForOptions(\App\Category::class, 'name')
                ->setLoadOptionsQueryPreparer(function($element, $query) {
                    return $query;
                })
                ->setDisplay('name')
                ->setColumnName('name')
                ->setPlaceholder('All names')
            ,
        ]);
        $display->getColumnFilters()->setPlacement('card.heading');

        return $display;
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $categories=Category::select('id','title')->get()->pluck('title','id')->toArray();

        $form = AdminForm::card()->addBody([
            AdminFormElement::columns()->addColumn([
                AdminFormElement::text('title', 'Назва')->required(),
                AdminFormElement::ckeditor('text', 'Зміст'),
                AdminFormElement::columns()->addColumn([
                    AdminFormElement::image('image', 'Зображення'),
                ],'col-xs-8 col-sm-6 col-md-8 col-lg-4' )->addColumn([
                    AdminFormElement::text('author', 'Автор'),
                    AdminFormElement::text('level', 'Складність'),
                    AdminFormElement::checkbox('solution', 'Розв\'язок'),
                ],
                    'col-xl-3 col-lg-6 col-md-8 col-3' ),

                AdminFormElement::html('<hr>'),
                AdminFormElement::datetime('created_at')
                    ->setVisible(true)
                    ->setReadonly(false)
                ,
                AdminFormElement::html('last AdminFormElement without comma'),
                AdminFormElement::text('id', 'ID')->setReadonly(true),
            ], 'col-xs-12 col-sm-6 col-md-8 col-lg-9')->addColumn(function () use($categories) {
                return [
                    AdminFormElement::hasMany('relLessonToIncategory', [
                        AdminFormElement::select('category_id')->setLabel('Категорія')
                            ->setOptions($categories)
                            ->setDisplay('Тип'),
                        AdminFormElement::checkbox('active','Видимість')
                        ,
//                        AdminFormElement::image('image','Зображення'),
                    ]),
                ];
            },'col-xs-3 col-sm-6 col-md-8 col-lg-3'),
        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
