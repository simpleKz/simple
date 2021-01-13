<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:30
 */

namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Support\Facades\Storage;

class PageController extends WebBaseController
{
    public function welcome()
    {
        return $this->frontView('pages.index');
    }

    public function home()
    {
        return $this->frontView('pages.index');
    }

//    public function files($relative_path)
//    {
//        if (Storage::cloud()->exists($relative_path)) {
//            return Storage::cloud()->response($relative_path);
//        }
//        abort(404);
//    }
//
//    public function privacy() {
//        return view('modules.privacy');
//    }
}
