<?php
class ProfileController extends \BaseController
{
    /*
     * View and Edit Users Profile
     */
    public function index()
    {
        if(Auth::check())
        {
            $user=Auth::user();
            return View::make('profile.index',compact('user'));
        }

    }
    /**
     * Update a created user in storage.
     *
     */
    public function update($id)
    {
        $input = Input::all();
        $validation = Validator::make($input,User::$profilerules);
        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update($input);

            return Redirect::route('users.index', $id);
        }
        return Redirect::route('users.index', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }
}