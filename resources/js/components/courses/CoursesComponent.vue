<template>
<!--    <div class="card col-md-12 col-12">-->
        <div class="card-body">
            <div v-if="loading" class="text-center text-muted">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Загрузка...</span>
                </div>
            </div>
            <div class="profile-data col-md-12 col-lg-12 row">
                <div v-if="is_active" class=" col-md-12 col-lg-12 row ">
                    <div class="course_type col-md-3 d-flex align-items-center justify-content-center cursor" @click="onClickCourseType(active)">
                        <a>Активные</a>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center cursor" @click="onClickCourseType(completed)">
                        <a>Завершенные</a>
                    </div>
                </div>
                <div  class=" col-md-12 col-lg-12 row" v-else>
                    <div class=" col-md-3 d-flex align-items-center justify-content-center cursor" @click="onClickCourseType(active)" >
                        <a>Активные</a>
                    </div>
                    <div class="course_type col-md-3 d-flex align-items-center justify-content-center cursor"  @click="onClickCourseType(completed)">
                        <a>Завершенные</a>
                    </div>
                </div>
                <div v-if="is_active" class="courses__content col-md-12 col-lg-12 col-12 row mt-3" >
                    <div class="col-md-6 pr-0 mb-3 " v-for="(data,index) in active_courses">
                        <div class="col-md-12 p-0">
                            <a class="course__card__content " :href="'/my-course/' + data.course.slug">
                                <div class="course__card__image col-5 d-flex align-items-center justify-content-center ">
                                    <img class="course_image" src="/modules/front/assets/img/course_img.png" alt="">
                                </div>
                                <div   class="course_card_info p-3 col-7">
                                    <h1>{{data.course.name}}</h1>
                                    <p>{{data.course.author.first_name + " " + data.course.author.last_name}}</p>
                                    <label>Пройдено {{data.passed_lessons_count}} уроков из {{data.overall_lessons_count}}
                                       </label>
                                    <k-progress
                                        status="success"
                                        type="line"
                                        :percent="35"
                                        color="#F76321"
                                        width=200px
                                        :show-text="false">
                                    </k-progress>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div v-if="completed" class="courses__content col-md-12 col-lg-12 col-12 row mt-3" >
                    <div class="col-md-6 pr-0 mb-3 " v-for="(course,index) in completed_courses">
                        <div class="col-md-12 p-0">
                            <div class="course__card__content ">
                                <div class="course__card__image col-5 d-flex align-items-center justify-content-center ">
                                    <img class="course_image" src="/modules/front/assets/img/course_img.png" alt="">
                                </div>
                                <div   class="course_card_info p-3 col-7">
                                    <h1>{{course.course.name}}</h1>
                                    <p>{{course.author.first_name + " " + course.author.last_name}}</p>
                                    <label>Пройдено {{course.passed_lessons_count}} уроков из {{course.overall_lessons_count}}
                                    </label>
                                    <k-progress
                                        status="success"
                                        type="line"
                                        :percent="35"
                                        color="#F76321"
                                        width=200px
                                        :show-text="false">
                                    </k-progress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<!--    </div>-->
</template>

<script>
    export default {
        name: "CoursesComponent.vue",
        data: function () {
            return {
                user: Object,
                loading: false,
                is_active:true,
                active:true,
                completed:false,
                active_courses:Array,
                completed_courses:Array,
            };
        },
        mounted: function () {
            this.loadCourses();
        },
        methods: {
            onClickCourseType: function (is_active) {
                this.is_active = is_active;
            },
            loadCourses: function () {
                const app = this;
                axios('/my/courses')
                    .then(function (resp) {
                        app.loading = true;
                        app.active_courses = resp.data.active_courses;
                        app.completed_courses = resp.data.completed_courses;
                        app.loading = false;
                    }).catch(function (resp) {
                });
            }

        }
    }
</script>

<style >
.profile-data a{
    font-size:20px;
    line-height:39px;
}
    .course_type{
        border-bottom: 2px solid #F76321;;
    }
.card-body{
    padding-right: 0 !important;
    padding-left: 0 !important;
}
.courses__content {
    display: flex;
    flex-wrap: wrap;
    padding-right: 0 !important;
    padding-left: 0 !important;
    /*justify-content: space-between;*/
}

.course__card {
    display: flex;
    /*!*flex-direction: column;*!*/
    /*!*align-items: center;*!*/
    /*border: 1px solid #DEDEDE;*/
    /*border-radius: 5px;*/
    /*background:#ffffff;*/
}
.course__card__content{
    display: flex;
    /*flex-direction: column;*/
    /*align-items: center;*/
    border: 1px solid #DEDEDE;
    border-radius: 5px;
    background:#ffffff;
    padding-right: 0 !important;
    padding-left: 0 !important;
}
.course__card__content h1{
    font-size: 29px;
    line-height: 35px;
    font-weight:bold;
}
.course__card__content  p{
    line-height: 13px;
    font-size: 11px;
}
.course_image{
    min-height: 100px;
    max-height: 300px;
    min-width: 100%;
    max-width: 100%;
    background: #FAFAFA;
    border: 1px solid #E0E0E0;
    box-sizing: border-box;
    border-radius: 5px;
    display: inline-block;
}
.course__card__image{
    padding-right: 0 !important;
    padding-left: 0 !important;
}
.course_card_info p{
    font-size: 12px;
    line-height: 14px;
    font-weight:normal;
}
.course_card_info h1{
    font-size: 18px;
    line-height: 22px;
    font-weight:bold;
}
.course_card_info label{
    font-size: 12px;
    line-height: 25px;
    font-weight:normal;
}
.course__card__content{
    color: rgba(5,6,6,0.93);
}
.course__card__content:hover {
    color: rgba(5,6,6,0.93);
    text-decoration: none !important;
}
.k-progress .k-progress-outer{
        padding-right: 0!important;
    }

</style>
