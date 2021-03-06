<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseWebForm;
use App\Http\Requests\Web\V1\CourseDetailWebRequest;
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

    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminView('pages.course.index', compact('courses'));
    }

    public function detail($id)
    {
        $course = Course::findOrFail($id);
        return $this->adminView('pages.course.detail', compact('course'));
    }

    public function detailUpdate($id, CourseDetailWebRequest $request)
    {
        $course = Course::findOrFail($id);
        $course->update([
            'detail_page_content' => $request->detail_page_content
        ]);
        return redirect()->back();
    }

    public function create()
    {
        $course_web_form = CourseWebForm::inputGroups(null);
        return $this->adminView('pages.course.create', compact('course_web_form'));
    }

    public function store(CourseWebRequest $request)
    {
        try {
            $path = $this->fileService->store($request->image, Course::DEFAULT_RESOURCE_DIRECTORY);
            Course::create([
                'name' => $request->name,
                'image_path' => $path,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'description' => $request->description,
                'video_path' => $request->video_path,
                'rating' => 0,
                'is_parent' => $request->is_parent ? 1 : 0,
                'is_visible' => $request->is_visible ? 1 : 0,
            ]);
            $this->added();
        } catch (\Exception $exception) {

            if ($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
        return redirect()->route('course.index');
    }

    public function edit(CourseWebRequest $request)
    {
        $course = Course::find($request->id);
        $course_web_form = CourseWebForm::inputGroups($course);
        return $this->adminView('pages.course.edit', compact('course', 'course_web_form'));
    }

    public function update(CourseWebRequest $request)
    {
        $course = Course::find($request->id);
        $old_path = $course->image_path;
        try {
            if ($request->image) {
                $path = $this->fileService->updateWithRemoveOrStore($request->image, Course::DEFAULT_RESOURCE_DIRECTORY, $old_path);
                $old_path = $path;
            }
            $course->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'description' => $request->description,
                'video_path' => $request->video_path,
                'image_path' => $old_path,
                'is_visible' => $request->is_visible ? 1 : 0,
            ]);
            $this->edited();
        } catch (\Exception $exception) {
            if ($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }

        return redirect()->route('course.index');
    }

    public function delete(CourseWebRequest $request)
    {
        $course = Course::find($request->id);
        $course->delete();
        $this->fileService->remove($course->image_path);
        $this->deleted();
        return redirect()->route('course.index');
    }

    public function courseDetail($id)
    {
        $course = Course::findOrFail($id);
        return $course;
    }
}
