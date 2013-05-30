<?php

class Controller_Auth extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );

	    $user = array();
	    // Check if session variables already exist
	    if (\Session::get('username')) {
	    	 Response::redirect('game');
	    } else
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
	    $this->template->content = View::forge('auth/index', $data);

	}

	public function action_create()
	{
		$data["subnav"] = array('create'=> 'active' );

		// Check if session variables already exist
	    if (\Session::get('username')) {
	    	 Response::redirect('game');
	    } else

		// If so, you pressed the submit button. Let's go over the steps.
		if(Input::post())
		{
			$name = Input::post('username');
	    	$pass = Input::post('password');
	    	$email = Input::post('email');

	        // Create account with above credentials
	        if (Auth::create_user($name,$pass,$email))
	        {
	            // Successful account creation in DB
	            Session::set_flash('success', 'Account created successfully!');
	            if (Auth::login($name, $pass))
		        {
		            // Credentials ok, go right in.
		            Session::set_flash('success', 'Logged in successfully!');
		            
		            Response::redirect('game');
		            //echo \Session::get('username');
		            //echo \Session::get('login_hash');
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
	        else
	        {
	            // Account creation failed
	            Session::set_flash('error', 'Account creation failed! Please send us a report with the &quot;Need Help?&quot; button below.');
	        }

		}






		$this->template->title = 'Create Account';
		$this->template->content = View::forge('auth/create', $data);
	}

	public function action_reset()
	{	// Password reset
		Response::redirect('game');
		$data["subnav"] = array('reset'=> 'active' );
		$this->template->title = 'Auth &raquo; Reset';
		$this->template->content = View::forge('auth/reset', $data);
	}

	public function action_logout()
	{
		$data["subnav"] = array('logout'=> 'active' );


		// Check if session variables already exist
	    if (!(\Session::get('username'))) {
	    	 Response::redirect('auth/index');
	    } else
		if (!Auth::logout()) {	// Auth::logout() always returns false for some reason, even though session variables are deleted
			Session::set_flash('success', 'Logged out successfully!');
	        Response::redirect('auth/index');
		}
		else
		{
			
			// Account creation failed
	        Session::set_flash('error', 'Logout failed somehow! Please send us a report with the &quot;Need Help?&quot; button below.');
	    }

		$this->template->title = 'Logout';
		$this->template->content = View::forge('auth/logout', $data);
	}

	public function action_delete()
	{	// Under review if account deletion is necessary

		Response::redirect('game');

		$data["subnav"] = array('delete'=> 'active' );
		$this->template->title = 'Auth &raquo; Delete';
		$this->template->content = View::forge('auth/delete', $data);
	}

	public function action_profile()
	{
		$data["subnav"] = array('profile'=> 'active' );

		// Check if session variables already exist
	    if (!(\Session::get('username'))) {
	    	 Response::redirect('game');
	    } else

		// If so, you pressed the submit button. Let's go over the steps.
		if(Input::post())
		{
			$first = Input::post('firstname');
	    	$last = Input::post('lastname');
	    	$birth = Input::post('birthdate');

	    	if(Input::post('newsletter') == 'yes')
	    	{
	    		$letter = 1;

	    	}else{
	    		$letter = 0;
	    	}
	    	

	        // Update account with below metadata
	        if (Auth::update_user(
	        		array(
	        			'firstname'=>$first,
	        			'lastname'=>$last,
	        			'birthdate'=>$birth,
	        			'newsletter'=>$letter,

	        		)

	        	))
	        {
	            // Successful account creation in DB
	            Session::set_flash('success', 'Profile updated successfully!');
	            
	        }
	        else
	        {
	            // Account creation failed
	            Session::set_flash('error', 'Profile update failed! Please send us a report with the &quot;Need Help?&quot; button below.');
	        }

		}






		$this->template->title = 'User Profile';
		$this->template->content = View::forge('auth/profile', $data);
	}

}
