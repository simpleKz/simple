<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CourseCategory;

class CourseWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        $authors_array = [];
        $authors = CourseAuthor::all();
        foreach ($authors as $author) {
            $selected = $value ? $value->author_id == $author->id ? 'selected' : '' : '';
            $authors_array[] = array('title' => $author->first_name." ".$author->last_name, 'value' => $author->id, 'selected' => $selected);
        }

        $categories_array = [];
        $categories = CourseCategory::all();
        foreach ($categories as $category) {
            $selected = $value ? $value->category_id == $category->id ? 'selected' : '' : '';
            $categories_array[] = array('title' => $category->name, 'value' => $category->id, 'selected' => $selected);
        }
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Основы маркетинга', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::select('author_id', '', 'Автор',
                true, $authors_array),
            FormUtil::select('category_id', '', 'Категория',
                true, $categories_array),
            FormUtil::textArea('description', 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать 
несколько абзацев более менее осмысленного текста рыбы на русском языке, 
а начинающему оратору отточить навык публичных выступлений 
в домашних условиях.', 'Описание',
                true, $value ? $value->description : ''),
            FormUtil::input('price', 20000, 'Цена',
                'number', true, $value ? $value->price : ''),
            FormUtil::input('video_path', 'https://www.youtube.com/watch?v=Jk7Ff9s2nkw', 'Ссылка на превью видео',
                'text', true, $value ? $value->video_path : ''),
            FormUtil::input('image', 'Выберите фото', 'Фото',
                'file', $value ? false : true)
        );
    }
}
