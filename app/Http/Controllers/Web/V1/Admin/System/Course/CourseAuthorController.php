<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseAuthorWebForm;
use App\Http\Requests\Web\V1\CourseAuthorWebRequest;
use App\Models\Entities\Course\CourseAuthor;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;

class CourseAuthorController extends WebBaseController
{

    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index() {
        $authors = CourseAuthor::paginate(10);
        $author_web_form = CourseAuthorWebForm::inputGroups();

        return $this->adminView('pages.author.index', compact('authors','author_web_form'));
    }

    public function edit(Request $request) {
        $author = null;
        if($request->author_id) {
            $author = $this->getAuthor($request->author_id);
        }
        $author_web_form = CourseAuthorWebForm::inputGroups($author);
        return $this->adminView('pages.author.update', compact('author', 'author_web_form'));

    }

    public function update(CourseAuthorWebRequest $request) {
        $author = new CourseAuthor();
        $path = null;
        $old_path = '';
        if($request->id) {
            $author = $this->getAuthor($request->id);
        }
        if($request->image) {
            $old_path = $author ? $author->image_path : '';
            $path = $this->fileService->store($request->image, CourseAuthor::DEFAULT_RESOURCE_DIRECTORY);
        }
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->description = $request->description;
        $author->image_path = !$path ? $author->image_path : $path;
        $author->save();
        if($old_path) {
            $this->fileService->remove($old_path);
        }
        $this->edited();
        return redirect()->route('author.index');
    }


    public function delete($id) {
        $author = $this->getAuthor($id);
        $this->fileService->remove($author->image_path);
        $author->delete();
        $this->deleted();
        return redirect()->route('author.index');
    }

    private function getAuthor($id) {
        $author = CourseAuthor::find($id);
        if(!$author) {
            throw new WebServiceExplainedException('Такого автора не существует!');
        }
        return $author;
    }
}
