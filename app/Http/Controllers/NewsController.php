<?php

namespace App\Http\Controllers;

use App\Mail\ImportantNews;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Sodium\compare;

class NewsController extends Controller
{
    /**
     * NewsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersWithNews = User::with('news')->get();

        $news = News::all();
        return view('news.index', compact('news', 'usersWithNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Manager') {

            return view('news.create');
        } else {

            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::user()->role == 'Manager') {

            $attributes['title'] = request('title');
            $attributes['description'] = request('description');
            $attributes['user_id'] = Auth::user()->id;
            $news = News::create($attributes);

            if (request('emailBroadcast')) {
                foreach (User::all() as $one) {

                    Mail::to($one->email)->queue(
                        new ImportantNews($news)
                    );
                }
            }

            return redirect()->route('news.index');

        } else {
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thisNews = News::find($id);

        return view('news.show', compact('thisNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $oneNews = News::find($id);

        return view('news.edit', compact('oneNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $oneNews = News::find($id);

        $oneNews->title = request('title');
        $oneNews->description = request('description');
        $oneNews->save();

        if (request('delete')){

            $id = request('delete');
            News::find($id)->delete();
        }

        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();

        return redirect('news');
    }
}
