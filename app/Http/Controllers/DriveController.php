<?php

namespace App\Http\Controllers;

use App\Drive;
use App\User;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drive.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = request('user');
        $driveLink = \request('driveLink');
        $userFound = User::where('name', 'LIKE', '%' . $user . '%')->orWhere('email', 'LIKE', '%' . $user . '%')->get();

        $conditional = Drive::where('user_id', $userFound[0]->id)->get();

        if ($conditional->isEmpty()) {
            $newDrive = new Drive();
            $newDrive->user_id = $userFound[0]->id;
            $newDrive->drive_link = $driveLink;
            $newDrive->save();
        } else {
            $findDrive = Drive::where('user_id', $userFound[0]->id)->first();
            $findDrive->drive_link = $driveLink;
            $findDrive->save();
        }


        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
