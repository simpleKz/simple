<?php


namespace App\Http\Controllers\Web\V1\Admin\System\Course;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseLessonWebForm;
use App\Http\Forms\Web\V1\CourseWebForm;
use App\Http\Requests\Web\V1\CourseCheckWebRequest;
use App\Http\Requests\Web\V1\CourseLessonWebRequest;
use App\Http\Requests\Web\V1\CourseWebRequest;
use App\Http\Requests\Web\V1\LessonMaterialCheckWebRequest;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CourseLesson;
use App\Models\Entities\Course\CourseLessonMaterial;
use App\Models\Entities\Course\CoursePassing;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CourseLessonController extends WebBaseController
{
    protected $fileService;
    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index(CourseCheckWebRequest $request) {

        $course_id = $request->course_id;
        $lessons = CourseLesson::where('course_id',$course_id)->orderBy('created_at', 'desc')->paginate(10);
        return $this->adminView('pages.course.lesson.index', compact('lessons','course_id'));
    }

    public function create(CourseCheckWebRequest $request) {
        $course_id = $request->course_id;
        $lesson_web_form = CourseLessonWebForm::inputGroups(null);
        return $this->adminView('pages.course.lesson.create', compact('lesson_web_form','course_id'));
    }

    public function store(CourseLessonWebRequest $request) {
        $docs = [];
        try {
            DB::beginTransaction();

            $lesson = CourseLesson::create([
                'name' => $request->name,
                'course_id' => $request->course_id,
                'description' => $request->description,
                'video_path' => $request->video_path,
                'duration_in_minutes' => $request->duration_in_minutes
            ]);
            if($request->has('docs')) {
                if($request->docs) {
                    foreach ($request->docs as $document) {
                        $doc_path = $this->fileService->storeMaterial($document, CourseLesson::DEFAULT_DOCUMENT_RESOURCE_DIRECTORY);
                        $docs[] = [
                            'lesson_id' => $lesson->id,
                            'type' => $document->getClientOriginalExtension(),
                            'material_path' => $doc_path
                        ];
                    }
                    CourseLessonMaterial::insert($docs);
                }
            }

            $course_passings = CoursePassing::where('course_id',$lesson->course_id)->get();
            foreach ($course_passings as $course_passing){
                $course_passing->overall_lessons_count = $course_passing->overall_lessons_count +1;
                $course_passing->save();
            }
            DB::commit();
            $this->added();
        } catch (\Exception $exception) {
            DB::rollBack();

            if(count($docs) >0 ){
                foreach ($docs as $doc){

                    $this->fileService->remove($doc['doc_path']);
                }
            }
            throw new WebServiceExplainedException($exception->getMessage());
        }
        return redirect()->route('lesson.index',['course_id' => $request->course_id]);
    }

    public function edit(CourseLessonWebRequest $request) {
        $lesson = CourseLesson::find($request->id);
        $lesson_web_form = CourseLessonWebForm::inputGroups($lesson);
        return $this->adminView('pages.course.lesson.edit', compact('lesson', 'lesson_web_form'));
    }

    public function update(CourseLessonWebRequest $request) {
        $lesson = CourseLesson::find($request->id);
        $docs = [];
        try {
            DB::beginTransaction();
            $lesson->update([
                'name' => $request->name,
                'description' => $request->description,
                'video_path' => $request->video_path,
                'duration_in_minutes' => $request->duration_in_minutes
            ]);

            if($request->has('docs')) {
                if($request->docs) {
                    foreach ($request->docs as $document) {
                        $doc_path = $this->fileService->storeMaterial($document, CourseLesson::DEFAULT_DOCUMENT_RESOURCE_DIRECTORY);
                        $docs[] = [
                            'lesson_id' => $lesson->id,
                            'type' => $document->getClientOriginalExtension(),
                            'material_path' => $doc_path
                        ];
                    }
                    CourseLessonMaterial::insert($docs);
                }
            }
            DB::commit();
            $this->edited();
        } catch (\Exception $exception) {
            DB::rollBack();
            if(count($docs) >0){
                foreach ($docs as $doc){

                    $this->fileService->remove($doc['doc_path']);
                }
            }
            throw new WebServiceExplainedException($exception->getMessage());
        }

        return redirect()->route('lesson.index',['course_id' => $lesson->course->id]);
    }

    public function deleteMaterial(LessonMaterialCheckWebRequest $request){
        $material = CourseLessonMaterial::find($request->id);
        $material->delete();
        $this->fileService->remove($material->material_path);
        $this->deleted();
        return redirect()->route('lesson.edit',['id' => $material->lesson->id]);
    }
    public function delete(CourseLessonWebRequest $request) {
        $lesson = CourseLesson::find($request->id);
        try{
            DB::beginTransaction();
            $course_passings = CoursePassing::where('course_id',$lesson->course_id)->get();
            foreach ($course_passings as $course_passing){
                $course_passing->overall_lessons_count = $course_passing->overall_lessons_count -1;
                $course_passing->save();
            }
            $lesson->docs()->delete();
            $lesson->delete();
            foreach ($lesson->docs as $material){
                $this->fileService->remove($material->material_path);
            }
            DB::commit();
            $this->deleted();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw new WebServiceExplainedException($exception->getMessage());
        }

        return redirect()->route('lesson.index',['course_id' => $lesson->course->id]);
    }
}
