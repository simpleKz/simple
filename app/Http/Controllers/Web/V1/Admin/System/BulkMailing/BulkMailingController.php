<?php


namespace App\Http\Controllers\Web\V1\Admin\System\BulkMailing;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\BulkMailingWebForm;
use App\Http\Requests\Web\V1\BulkMailingWebRequest;
use App\Jobs\SendEmailJob;
use App\Models\Entities\Core\BulkMailing;

class BulkMailingController extends WebBaseController
{
    public function index() {

        $bulk_mailing_web_form = BulkMailingWebForm::inputGroups();

        return $this->adminView('pages.bulk-mailing.index', compact('bulk_mailing_web_form'));
    }

    public function send(BulkMailingWebRequest $request) {
        $details['topic'] = $request->topic;
        $details['description'] = $request->description;
        $mails = BulkMailing::whereNotNull('email')->get();
        foreach ($mails as $mail){
            $details['email'] = $mail->email;
            dispatch(new SendEmailJob($details));
        }
        $this->sent();
        return redirect()->route('bulk_mailing.index');
    }
}
