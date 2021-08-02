<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\SignInRequest;
use Auth;
use Storage;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User();
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->password = bcrypt($request['password']);
        $user->save();

        Auth::login($user);

        return redirect()->route('posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { }

    public function editProfile()
    {
        return view('account', ['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { }

    public function updateProfile(Request $request)
    {
        $id = $request->id;
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';

        if ($file) {
            Storage::disk('avatars')->put($filename, File::get($file));
        }
        return redirect()->route('profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postSignIn(SignInRequest $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect('/posts');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
}
