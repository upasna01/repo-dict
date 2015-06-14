<?php

class LoginController extends BaseController {

    public function user()
    {
        // get POST data
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        //print_r($userdata); exit;
        if(Auth::attempt($userdata))
        {
            // we are now logged in
            return Redirect::to('home');
        }
        else
        {
            return Redirect::to('/');
            //->with('message','incorrect email or password');
        }
    }
}
?>