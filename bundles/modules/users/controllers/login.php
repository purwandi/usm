<?php
/**
 * Ujian Saringan Masuk
 *
 * @package  USM
 * @version  1.0.0
 * @author   Purwandi <pur@purwandi.me>
 * @license  MIT License
 * @link     http://purwandi.me
 */
class Users_Login_Controller extends Base_Controller {
    
    public function action_index()
    {
        if ($_POST)
        {
            // because, we just need username and password
            // let's custom validate user 
            $rules = array(
                'username' => 'required',
                'password' => 'required'
            );

            $val = Validator::make(Input::all(), $rules);

            if ($val->fails())
            {
                echo "Login error";
            }
            else
            {
                if (Auth::attempt(array(
                        'username' => Input::get('username'), 
                        'password' => Input::get('password'))))
                {
                    return Redirect::home();
                }
                else
                {
                    echo "Login error, password tidak cocok";
                }
            }
        }
        else
        {
            return View::make('Users::login');
        }
        
    }

}