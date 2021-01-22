<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseLessonMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lesson_materials', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->longText('material_path');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')
                ->references('id')
                ->on('course_lessons');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lesson_materials');
    }
}
