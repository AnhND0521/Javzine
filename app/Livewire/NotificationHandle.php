<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
class NotificationHandle extends Component
{
    public $notifications;
    protected $listeners = ['markNotificationAsRead'];
    public function mount(){
        $this->notifications = Auth::user()->getUnreadNotifications;
    }
    public function markNotificationAsRead($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->update(['status' => 'read']);
        }

        $this->notifications = Notification::where('status', 'unread')->get();
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
