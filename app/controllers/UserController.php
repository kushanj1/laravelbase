<?php

class UserController extends BaseController {

    public function getRegisterUser()
    {
        return View::make('user/register');
    }

    public function postRegisterUser()
    {
        // Get all the inputs.
        $userdata = array(
            'fullname'  => Input::get('fullname'),
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
        // Declare the rules for the form validation.
        $rules = array(
            'fullname'  => 'Required',
            'email'     => 'Required',
            'password'  => 'Required'
        );
        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            $user = User::where('email' , '=', $userdata['email'])->first();
            if($user == null)
            {
                $user = new User;
                $user->fullname = $userdata['fullname'];
                $user->email    = $userdata['email'];
                $user->password = Hash::make($userdata['password']);
                $user->save();
                if ( Auth::attempt($userdata ) ) {
                    return Redirect::to('');
                }
            }
            else
            {
                return Redirect::to('register')->withErrors(array('email' => 'Email already has an account'))->withInput(Input::except('password'));
            }

        }
        //something went wrong
        return Redirect::to('register')->withErrors($validator)->withInput(Input::except('password'));
    }
}
