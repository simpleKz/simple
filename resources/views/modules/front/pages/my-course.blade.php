@extends('modules.front.layouts.app-main')

@section('styles')
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/my-course.css')}}">
    <link rel="stylesheet" href="{{asset('modules/front/assets/css/components/my-course-responsive.css')}}">
    <style>

    </style>
@endsection

@section('content')
    <div class="back_links">
        <a href="{{route('index')}}">Главная &#8594;</a>
        <a href="{{route('courses')}}">Каталог курсов &#8594;</a>
        <a href="{{route('my-course', ['slug' => $course->slug])}}">{{$course->name}} </a>
    </div>
    <section class="my-course">
        <div class="container-fluid">
            <div class="course-header">
                <h1>{{$course->name}}</h1>
                <div class="row align-items-center mt-3">
                    <h2 class="col-12 col-md-6 col-lg-3">Спикер: {{$course->author->fullName()}}</h2>
                    <h2 class="col-12 col-md-6 col-lg-3">Продолжительность: {{$overall_minutes}} минут</h2>
                </div>
            </div>
            <div class="course__content row mt-3 mt-lg-5 order-0">
                <div class="lesson_video_card col-12 col-lg-8">
                    <iframe id="player" class="lesson_video"
                            src="{{$last_lesson->video_path}}?enablejsapi=1" allowfullscreen>
                    </iframe>
                </div>
                <div class="lessons_content col-12 col-lg-4 mt-3 mt-lg-0 order-2 order-lg-1" id="all_lessons_content">
                   @include('modules.front.pages.parts.all_lessons')
                </div>
                <div class="lesson mt-3 col-12 col-lg-8 order-1 order-lg-2">
                    <div class="lesson_info">
                        <h2 id="lessonOrder">{{$last_lesson->order}}</h2>
                        <h1 id="lessonName">{{$last_lesson->name}}</h1>
                        <p id="lessonDescription">{{$last_lesson->description}}</p>
                    </div>
                    <div class="lesson_materials col-12 col-md-8 col-lg-8 mt-4 mt-lg-5">
                        <h1>Прикрепленные материалы</h1>
                        <div class="row">
                            <div class="col-12 mt-2 justify-content-start" id="lessonMaterials">
                                @foreach($last_lesson->docs as $material)
                                    <a class="material" href="{{asset($material->material_path)}}"
                                       download="{{$last_lesson->name.'-'.$material->id.'.'.$material->type}}"
                                       target="_blank">{{$last_lesson->name.'-'.$material->id.'.'.$material->type}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-12 pt-5">
                        <a class="btn-orange" href="#" onclick="nextLesson(this)">Следующее занятие
                            <i class="fas fa-arrow-right pl-4"></i>
                        </a>
                    </div>
                    {{--                <div class="course_finish col-12 col-md-8 col-lg-8">--}}
                    {{--                    <p><i class="far fa-share"></i> Поделитесь своим достижением</p>--}}
                    {{--                    <div class="icons d-flex mt-2">--}}
                    {{--                        <a class="material mr-2 "><i class="fab fa-instagram"></i></a>--}}
                    {{--                        <a class="material  mr-2"><i class="fab fa-vk"></i></a>--}}
                    {{--                        <a class="material  mr-2"><i class="fab fa-facebook"></i></a>--}}
                    {{--                        <a class="material  mr-2"><i class="fab fa-vk"></i></a>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--                <div class="pt-5">--}}
                    {{--                    <a class="btn-orange col-md-5 pt-3 pb-3 pl-5 pr-5 d-flex align-items-center justify-content-between" href="#">--}}
                    {{--                        <label>Завершить курс</label>--}}
                    {{--                        <i class="fa fa-arrow-right"></i>--}}
                    {{--                    </a>--}}
                    {{--                </div>--}}
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script src="http://www.youtube.com/iframe_api"></script>

    <script type="text/javascript">
        var url = '{!! route('pass.lesson') !!}';
        var lastLesson = {!! $last_lesson !!};
        var lessons = {!! $course->lessons !!};
        var nextLessonExist = true;
            window.onYouTubeIframeAPIReady = function () {
            new YT.Player('player', {
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        };

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                fetch(url + '/' + lastLesson.id, {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                })
                    .then(response => response.text())
                    .then(result => {
                        document.getElementById('all_lessons_content').innerHTML = result;

                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        function changeLesson(lesson) {

            if (lesson.id === lastLesson.id) {
                return false;
            }
            var player = document.getElementById('player');
            var order = document.getElementById('lessonOrder');
            var name = document.getElementById('lessonName');
            var description = document.getElementById('lessonDescription');
            var materials = document.getElementById('lessonMaterials');
            var lessonContent = document.getElementById('lesson' + lesson.id);
            var lessonIcon = document.getElementById('lessonIcon' + lesson.id);
            player.src = lesson.video_path + '?enablejsapi=1';
            name.innerText = lesson.name;
            order.innerText = lesson.order;
            description.innerText = lesson.description;
            materials.innerHTML = "";
            lesson.docs.forEach(function (e) {
                let a = document.createElement('a');
                a.href = '{!! asset('/') !!}' + e.material_path;
                a.target = '_blank';
                a.className = 'material';
                a.download = lesson.name + '-' + e.id + '.' + e.type;
                a.text = lesson.name + '-' + e.id + '.' + e.type;
                materials.appendChild(a);
            });

            lessonContent.classList.add('lesson__playing');
            lessonIcon.innerHTML = `<span class="read-more-circle-around ">
                                                <i class="fas fa-play"></i>
                                        </span>`;
            var lastLessonContent = document.getElementById('lesson' + lastLesson.id);
            var lastLessonIcon = document.getElementById('lessonIcon' + lastLesson.id);
            lastLessonContent.classList.remove('lesson__playing');
            lastLessonIcon.innerHTML = "";
            if(lastLesson.passed === true) {
                lastLessonIcon.innerHTML = `<span class="read-more-circle-around ">
                                                <i class="fas fa-check"></i>
                                        </span>`
            }
            lastLesson = lesson;
        }

        function nextLesson(event) {
            var lastIndex = 0;
            for (var i = 0; i < lessons.length; i++) {
                if (lessons[i].id == lastLesson.id) {
                    lastIndex = i;
                    break;
                }
            }
            if(lessons[lastIndex + 1] === undefined) {
                return false;
            }
            changeLesson(lessons[lastIndex + 1])
        }
    </script>
@endsection
