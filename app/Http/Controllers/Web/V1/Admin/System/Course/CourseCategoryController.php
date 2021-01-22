<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CategoryWebForm;
use App\Http\Requests\Web\V1\CategoryWebRequest;
use App\Models\Entities\Course\CourseCategory;


class CourseCategoryController extends WebBaseController
{
    public function index() {
        $categories = CourseCategory::paginate(10);
        $category_web_form = CategoryWebForm::inputGroups();

        return $this->adminView('pages.category.index', compact('categories','category_web_form'));
    }

    public function store(CategoryWebRequest $request) {
        $category = new CourseCategory();
        $category->name = $request->name;
        $category->save();
        $this->added();
        return redirect()->route('category.index');
    }


    public function update(CategoryWebRequest $request) {
        $category = CourseCategory::find($request->id);
        $category->name = $request->name;
        $category->save();
        $this->edited();
        return redirect()->route('category.index');
    }

    public function delete(CategoryWebRequest $request) {
        CourseCategory::destroy($request->id);
        $this->deleted();
        return redirect()->route('category.index');
    }
}
