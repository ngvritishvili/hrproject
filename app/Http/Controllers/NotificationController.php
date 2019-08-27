<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usersWithNotification = User::with('notifications')->get();
        $notifiesWithUsers = Notification::with('users')->get();
        $notifications = Notification::all();


        foreach ($notifications as $one){
            $one->status = 1;
            $one->save();
        }
        return view('notifications.index', compact('usersWithNotification','notifiesWithUsers','notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 'Employee'){
            $newNotify = new Notification();
            $newNotify->title = request('title');
            $newNotify->description = request('description');
            $newNotify->user_id = Auth::user()->id;
            $newNotify->save();
            return redirect()->route('profile');
        } else {
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneNotification = Notification::find($id);

        return view('notifications.edit', compact('oneNotification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oneNotification = Notification::find($id);

        $oneNotification->title = request('title');
        $oneNotification->description = request('description');
        $oneNotification->save();

        return redirect('notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notification::find($id)->delete();

        return redirect('notifications');
    }
}
