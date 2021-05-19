<h1>Следующие занятия</h1>
<div class="lessons mt-4">
    @foreach($course->lessons as $lesson)
        <div class="lesson__card__content {{!$lesson->passed ? 'lesson__status' : ''}}
        {{$lesson == $last_lesson && !$lesson->passed ? 'lesson__playing' : ''}}
            mb-3 p-3 col-md-12 align-items-center" id="lesson{{$lesson->id}}"
             onclick="changeLesson({{$lesson}})">
            <div class="dir_text col-10">
                <p>{{$lesson->order}}</p>
                <h1>{{$lesson->name}}</h1>
                @if(!$lesson->passed)
                    <h2><i class="far fa-clock"></i>
                        {{$lesson->duration_in_minutes}} минут</h2>
                @endif
            </div>
            <div class="dir_circle" id="lessonIcon{{$lesson->id}}">
                @if($lesson->passed || $lesson == $last_lesson)
                    <span class="read-more-circle-around ">
                                                <i class="fas {{$lesson->passed ? 'fa-check' : ''}}
                                                {{$lesson == $last_lesson && !$lesson->passed ? 'fa-play' : ''}}"></i>
                                        </span>
                @endif
            </div>
        </div>
    @endforeach
</div>
