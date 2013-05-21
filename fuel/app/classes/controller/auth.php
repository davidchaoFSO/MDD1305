<?php

class Controller_Auth extends Controller_Template
{

	public function action_index()
	{
		//$data["subnav"] = array('index'=> 'active' );
		//$this->template->title = 'Auth &raquo; Index';
		//$this->template->content = View::forge('auth/index', $data);*/

	    $user = array();

	    // If so, you pressed the submit button. Let's go over the steps.
	    if (Input::post())
	    {
	    	$name = Input::post('username');
	    	$pass = Input::post('password');

	        // Check the credentials. This assumes that you have the previous table created and
	        // you have used the table definition and configuration as mentioned above.
	        if (Auth::login($name, $pass))
	        {
	            // Credentials ok, go right in.
	            Session::set_flash('success', 'Logged in successfully!');
	            Response::redirect('game');
	        }
	        else
	        {
	            // Oops, no soup for you. Try to login again. Set some values to
	            // repopulate the username field and give some error text back to the view.
	            $user['username']    = Input::post('username');
	            $user['login_error'] = 'Incorrect username/password combo. Please try again';
	            Session::set_flash('error', $user['login_error']);
	        }
	    }

	    // Show the login form.
	    $this->template->title = "Login";
	    $this->template->content = View::forge('auth/index', $user);
	    //echo View::forge('auth/login',$user);
	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );
		$this->template->title = 'Auth &raquo; Create';
		$this->template->content = View::forge('auth/create', $data);
	}

	public function action_reset()
	{
		$data["subnav"] = array('reset'=> 'active' );
		$this->template->title = 'Auth &raquo; Reset';
		$this->template->content = View::forge('auth/reset', $data);
	}

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Auth &raquo; Logout';
		$this->template->content = View::forge('auth/logout', $data);
	}

	public function action_delete()
	{
		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Auth &raquo; Delete';
		$this->template->content = View::forge('auth/delete', $data);
	}

}
