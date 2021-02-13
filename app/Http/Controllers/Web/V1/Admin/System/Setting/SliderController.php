<?php

namespace App\Http\Controllers\Web\V1\Admin\System\Setting;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Setting\SliderWebForm;
use App\Http\Requests\Web\V1\Setting\SliderWebRequest;
use App\Models\Entities\Setting\Slider;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;

class SliderController extends WebBaseController
{

    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index() {
        $sliders = Slider::paginate(10);
        return $this->adminView('pages.setting.slider.index', compact('sliders'));
    }

    public function edit(Request $request) {
        $slider = null;
        if($request->slider_id) {
            $slider = $this->getSlider($request->slider_id);
        }
        $slider_web_form = SliderWebForm::inputGroups($slider);
        return $this->adminView('pages.setting.slider.update', compact('slider', 'slider_web_form'));
    }

    public function update(SliderWebRequest $request) {
        $slider = new Slider();
        $path = null;
        $old_path = '';
        if($request->id) {
            $slider = $this->getSlider($request->id);
        }
        if($request->image) {
            $old_path = $slider ? $slider->image_path : '';
            $path = $this->fileService->store($request->image, Slider::DEFAULT_RESOURCE_DIRECTORY);
        }
        $slider->title = $request->title;
        $slider->redirect_url = $request->redirect_url;
        $slider->description = $request->description;
        $slider->image_path = !$path ? $slider->image_path : $path;
        $slider->save();
        if($old_path) {
            $this->fileService->remove($old_path);
        }
        $this->edited();
        return redirect()->route('slider.index');
    }

    public function delete($id) {
        $slider = $this->getSlider($id);
        $this->fileService->remove($slider->image_path);
        $slider->delete();
        $this->deleted();
        return redirect()->route('slider.index');
    }

    private function getSlider($id) {
        $slider = Slider::find($id);
        if(!$slider) {
            throw new WebServiceExplainedException('Такого слайдера не существует!');
        }
        return $slider;
    }
}
