<?php

namespace App\Http\Controllers;

use App\Image;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $AuthDriveLink = Auth::user()->drive_links;
        if (Auth::user()->drive_links == null) {
            $AuthDrive = '';
        } else {
            foreach ($AuthDriveLink as $link) {

                $AuthDrive = $link->drive_link;
            }
        }


        $userList = User::all();
        $authUserProfileImages = '';
        $imagesAll = Image::all();

        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');
        }

        $userWithImages = User::with('images', 'drive_links')->get();
        $usersWithNotification = User::with('notifications');

        return view('profile', ['userWithImages' => User::with('images', 'drive_links')->paginate(15)], compact('authUserProfileImages', 'userList', 'usersWithNotification', 'AuthDrive'));
    }


    public function search()
    {

        $search = request('search');
        $result = User::with('images','drive_links')->where('name', 'LIKE', '%' . $search . '%')->orWhere('email', 'LIKE', '%' . $search . '%')->get();

        return view('search', compact('result'));
    }

    public function profile(Request $request)
    {




        $badge = request('badgeOfMonth');


        if ($badge != null) {

            $users = User::all();
            foreach ($users as $one) {
                $one->badge = 0;
                $one->save();
            }

            $id = request('badgeOfMonth');
            $findUser = User::find($id);
            $findUser->badge = 1;
            $findUser->save();

            return back();
        }

        $allImages = Image::all();
        $userList = User::all();
        $userWithImages = User::with('images', 'drive_links')->get();


//        dd($userWithImages);

        $usersWithNotification = User::with('notifications')->get();
        $notifiesWithUsers = Notification::with('users')->get();
        $notifications = Notification::all();

        $forViewAuthUserIdImagesArray = [];
        $forViewAuthUserInsurance_docImagesArray = [];
        $forViewAuthUserContractImagesArray = [];


        $AuthDriveLink = Auth::user()->drive_links;
        if (Auth::user()->drive_links == null) {
            $AuthDrive = '';
        } else {
            foreach ($AuthDriveLink as $link) {

                $AuthDrive = $link->drive_link;
            }
        }


        $authUserIdImages = Image::all()->where('user_id', Auth::user()->id);

        foreach ($authUserIdImages as $one) {

            if ($one->id_passport != null) {
                $forViewAuthUserIdImagesArray[] = explode(",", $one->id_passport);
            }

            if ($one->contract != null) {
                $forViewAuthUserContractImagesArray[] = explode(",", $one->contract);
            }

            if ($one->insurance_doc != null) {
                $forViewAuthUserInsurance_docImagesArray[] = explode(",", $one->insurance_doc);
            }
        }
        $authUserProfileImages = '';
        $imagesAll = Image::all();


        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        }

        return view('profile', ['userWithImages' => User::with('images', 'drive_links')->paginate(15)], compact('authUserIdImages', 'userList', 'allImages', 'userWithImages', 'forViewAuthUserIdImagesArray', 'forViewAuthUserContractImagesArray', 'forViewAuthUserInsurance_docImagesArray', 'authUserProfileImages', 'usersWithNotification', 'notifications', 'notifiesWithUsers', 'AuthDrive'));
    }

    public function settings()
    {
        $authUserProfileImages = '';
        $imagesAll = Image::all();


        if (!$imagesAll->isEmpty()) {
            $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        }

        return view('settings', compact('authUserProfileImages'));
    }


    public function editDays(Request $request)
    {

        if (request('badgeOfMonth')) {
            $users = User::all();
            foreach ($users as $one) {
                $one->badge = 0;
                $one->save();
            }

            $id = request('badgeOfMonth');
            $findUser = User::find($id);
            $findUser->badge = 1;
            $findUser->save();

            return back();
        }

        if (request('vocationDays')) {
            $newVocationDays = request('vocationDays');
            $id = request('id');
            $findUser = User::find($id);
            $findUser->vocation_days = $newVocationDays;
            $findUser->save();

            return back();
        }

        if (request('sickDays')) {
            $newSickDays = request('sickDays');
            $id = request('id');
            $findUser = User::find($id);
            $findUser->sick_days = $newSickDays;
            $findUser->save();

            return back();

        }


    }

    public function store(Request $request)

    {
        request()->validate([

            'picture_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',

        ]);

        $imageName = Auth::user()->name . time() . '.' . request()->picture_name->getClientOriginalExtension();
        request()->picture_name->move(public_path('img/profile_imgs'), $imageName);

        $porpertyOne = DB::table('user_images')->where('user_id', Auth::user()->id)->where('picture_name', '!=', null)->pluck('picture_name');


        if (!$porpertyOne->isEmpty()) {
            $authUserProfilePicture = Image::all()->where('picture_name', '!=', null);
            foreach ($authUserProfilePicture as $one) {
                $one->picture_name = $imageName;
                $one->save();
            }
        } else {
            $authUserProfilePicture = new Image();
            $authUserProfilePicture->picture_name = $imageName;
            $authUserProfilePicture->user_id = Auth::user()->id;
            $authUserProfilePicture->save();
        }

        $userWithImages = User::with('images', 'drive_links')->get();
        $userImages = image::all()->where('user_id', 'id')->pluck('picture_name');


        $authUserProfileImages = Image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');

        $authUserIdImages = image::all()->last()->where('user_id', Auth::user()->id)->pluck('picture_name');
        $userList = User::all();

        return view('profile', compact('authUserIdImages', 'imageName', 'userList', 'userImages', 'userWithImages', 'authUserProfileImages'));


    }

    public function manager()
    {

        return view('manager');
    }

    public function postmanager()
    {

        return view('manager');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function settingsStore(Request $request)
    {

        request()->validate([

            'picture_name' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $employee = User::all();

        $authUser = Auth::user();

        if ($request->hasFile('picture_name')) {
            $imageName = Auth::user()->name . time() . '.' . request()->picture_name->getClientOriginalExtension();
            request()->picture_name->move(public_path('img/profile_imgs'), $imageName);


            $porpertyOne = DB::table('user_images')->where('user_id', Auth::user()->id)->where('picture_name', '!=', null)->pluck('picture_name');


            if (!$porpertyOne->isEmpty()) {
                $authUserProfilePicture = Image::all()->where('picture_name', '!=', null);
                foreach ($authUserProfilePicture as $one) {
                    $one->picture_name = $imageName;
                    $one->save();
                }
            } else {
                $authUserProfilePicture = new Image();
                $authUserProfilePicture->picture_name = $imageName;
                $authUserProfilePicture->user_id = Auth::user()->id;
                $authUserProfilePicture->save();
            }

        }

        if (!$request->input('name') == null) {
            $authUser->name = $request->input('name');
        }

        if (!$request->input('address') == null) {
            $authUser->address = $request->input('address');
        }

        if (!$request->input('tel') == null) {
            $authUser->phone = $request->input('tel');
        }
        if (!$request->input('password') == null) {
            $authUser->password = bcrypt($request->input('password'));
        }


        $authUser->save();

        return back();

    }

    public function return()
    {

        return view('return');
    }
}
