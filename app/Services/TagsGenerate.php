<?php

namespace App\Services;

use App\Category;
use App\Lesson;

class TagsGenerate
{
    /**
     * @param Category $category
     *
     * @return void
     */
    public function generateByCategory(Category $category)
    {

        $lessons = $category->lessons()->get();

        $tags = [];
        foreach ($lessons as $lesson) {
            foreach (explode(",", $lesson->tags) as $tag) {
                if (!empty($tag)) {
                    $tags[] = trim($tag, " \n\r\t\v\x00");
                }
            }
        }

        $tags = array_unique($tags);
        sort($tags);
        $category->setTags($tags);
        $category->save();
    }
}
