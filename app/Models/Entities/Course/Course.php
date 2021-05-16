<?php


namespace App\Models\Entities\Course;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    public const DEFAULT_RESOURCE_DIRECTORY = 'images/courses';

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'video_path',
        'category_id',
        'author_id',
        'rating',
        'is_parent',
        'is_visible',
        'detail_page_content',
    ];

    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function author()
    {
        return $this->belongsTo(CourseAuthor::class, 'author_id', 'id')
            ->select(['id', 'first_name', 'last_name'])->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id', 'id')->select(['id', 'name']);
    }

    public function lessons()
    {
        return $this->hasMany(CourseLesson::class, 'course_id', 'id')->with('docs');
    }

    public function packets()
    {
        return $this->hasMany(Packet::class, 'course_id');
    }

    public function detailsLink()
    {
        return $this->is_parent ? route('packet.index', ['course_id' => $this->id]) :
            route('lesson.index', ['course_id' => $this->id]);
    }

    public function lessonTime()
    {
        $lessons = $this->lessons;
        $minutes = 0;
        foreach ($lessons as $lesson) {
            $minutes += $lesson->duration_in_minutes;
        }
        return intval(($minutes / 60));
    }

    public function getDetailContent()
    {
        if ($this->detail_page_content && trim($this->detail_page_content) != '') {
            return $this->detail_page_content;
        }
        return '<section class="auditory">
        <div class="container-fluid">
            <h1>Кому подойдет этот курс?</h1>
            <p>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
            </p>
            <div class="row justify-content-between">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1>Начинающих маркетологов</h1>
                            <p>Если нужен текст</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="talents">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <h1>Чем занимается маркетолог?</h1>
                </div>
                <div class="col-11 col-md-8 col-lg-8">
                    <p class="pt-1 pb-4">
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                        <span class="dots fas  fa-circle fa-xs"></span>
                    </p>
                    <div class="description-text">
                        <p>
                            Продакт-маркетолог помогает бизнесу формулировать ценность
                            продукта. Главная задача специалиста — не продать, а донести
                            эту ценность до коллег и пользователя.
                            Для этого он изучает потребности и боли целевой аудитории,
                            собирает инсайты и передаёт информацию всем участникам команды.
                            На этом курсе мы дадим ключевые знания для работы в новой
                            профессии и развития в карьере.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <img src="/modules/front/assets/img/girl2.png" alt="">
                </div>
            </div>
            <div class="pt-5 pt-md-3 d-flex">
                <a class="btn-orange" href="#">Начать обучение</a>
            </div>
        </div>
    </section>
    <section class="skills">
        <div class="container-fluid">
            <h1>Чему научишься на курсе</h1>
            <p>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
                <span class="dots fas fa-circle fa-xs"></span>
            </p>

            <div class="row justify-content-between">
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
                <div class="skills__card__content mb-2 col-md-6 col-lg-4 mb-4">
                    <h1>Изучать и анализировать аудиторию</h1>
                    <p>Понимать основы сегментирования ЦА,<br>
                        составлять портреты клиентов и пр.</p>
                </div>
            </div>
            <div class="start_learning pt-4">
                <a class="btn-orange" href="#">Начать обучение</a>
            </div>
        </div>
    </section>';

    }


}
