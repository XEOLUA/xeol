<?php

namespace App\Services;

use App\Category;

class TagsGenerate
{
    /**
     * @param Category $category
     *
     * @return void
     */
    public function generateByCategory(Category $category)
    {
        $tags = [];
        foreach ($category->first()->relCategoryToLesson as $lesson) {
            foreach (explode(",", $lesson->tags) as $tag) {
                if (!empty($tag)) {
                    $tags[] = trim($tag, " \n\r\t\v\x00");
                }
            }
        }

        $tags = array_unique($tags);

        $category->setTags($tags);
        $category->save();
    }
}
