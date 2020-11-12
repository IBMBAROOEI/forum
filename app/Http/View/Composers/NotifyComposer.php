<?php
namespace App\Http\View\Composers;



use Illuminate\View\View;

class NotifyComposer
{
    public function compose(View $view)
    {
        $notifications = auth()->user()->notifications()->get();
        return $view->with("notifications", $notifications);
    }
}