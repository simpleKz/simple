<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseWebForm;
use App\Http\Requests\Web\V1\CourseWebRequest;
use App\Models\Entities\Course\Course;
use App\Services\Common\V1\Support\FileService;

class CourseController extends WebBaseController
{
    protected $fileService;
    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index() {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminView('pages.course.index', compact('courses'));
    }

    public function create() {
        $course_web_form = CourseWebForm::inputGroups(null);
        return $this->adminView('pages.course.create', compact('course_web_form'));
    }

    public function store(CourseWebRequest $request) {

        try {
            $path = $this->fileService->store($request->image, Course::DEFAULT_RESOURCE_DIRECTORY);
            Course::create([
                'name' => $request->name,
                'image_path' => $path,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'description' => $request->description,
                'price' => $request->price,
                'video_path' => $request->video_path,
                'rating' =>0

            ]);
            $this->added();
        } catch (\Exception $exception) {

            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
        return redirect()->route('course.index');
    }

    public function edit(CourseWebRequest $request) {
        $course = Course::find($request->id);
        $course_web_form = CourseWebForm::inputGroups($course);
        return $this->adminView('pages.course.edit', compact('course', 'course_web_form'));
    }

    public function update(CourseWebRequest $request) {
        $course = Course::find($request->id);
        $old_path = $course->image_path;
        try {
            if($request->image) {
                $path = $this->fileService->updateWithRemoveOrStore($request->image, Course::DEFAULT_RESOURCE_DIRECTORY, $old_path);
                $old_path = $path;
            }
            $course->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'description' => $request->description,
                'price' => $request->price,
                'video_path' => $request->video_path,
                'image_path' => $old_path
            ]);
            $this->edited();
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }

        return redirect()->route('course.index');
    }

    public function delete(CourseWebRequest $request) {
        $course = Course::find($request->id);
        $course->delete();
        $this->fileService->remove($course->image_path);
        $this->deleted();
        return redirect()->route('course.index');
    }
}
