<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseAuthorWebForm;
use App\Http\Requests\Web\V1\CourseAuthorWebRequest;
use App\Models\Entities\Course\CourseAuthor;

class CourseAuthorController extends WebBaseController
{
    public function index() {
        $authors = CourseAuthor::paginate(10);
        $author_web_form = CourseAuthorWebForm::inputGroups();

        return $this->adminView('pages.author.index', compact('authors','author_web_form'));
    }

    public function store(CourseAuthorWebRequest $request) {
        $author = new CourseAuthor();
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->save();
        $this->added();
        return redirect()->route('author.index');
    }


    public function update(CourseAuthorWebRequest $request) {
        $author = CourseAuthor::find($request->id);
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->save();
        $this->edited();
        return redirect()->route('author.index');
    }

    public function delete(CourseAuthorWebRequest $request) {
        CourseAuthor::destroy($request->id);
        $this->deleted();
        return redirect()->route('author.index');
    }
}
