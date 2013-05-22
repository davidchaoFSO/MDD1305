<?php
class Controller_Game extends Controller_Template{

	public function action_index()
	{	// If user is logged in
		if (!(\Session::get('username'))) {
	    	 Response::redirect('auth/index');
	    }else{
	    $user = \Session::get('username');
	    // Query only finds list for logged in user
		$data['games'] = Model_Game::find('all', array(
		    'where' => array(array('user', $user),),
		    'order_by' => array('updated_at' => 'desc'),));	
		$this->template->title = "Games";
		$this->template->content = View::forge('game/index', $data);
		}
	}

	public function action_view($id = null)
	{
		
		if($game = Model_Game::find($id)){

			$name = \Session::get('username');

			if(!($game->user == $name)) {
				// if logged in user tries to view another user's entry
				$id=null;
				Session::set_flash('error', 'Could not find that game!');
			}
		}

		is_null($id) and Response::redirect('game');

		if ( ! $data['game'] = Model_Game::find($id))
		{
			Session::set_flash('error', 'Could not find game #'.$id);
			Response::redirect('game');
		}

		$this->template->title = "Game";
		$this->template->content = View::forge('game/view', $data);

	}

	public function action_create()
	{
		if (!($name = \Session::get('username')))
		{	//If no user is logged in
			Response::redirect('auth/index');
		}else
		if (Input::method() == 'POST')
		{
			$val = Model_Game::validate('create');
			
			if ($val->run())
			{
				$game = Model_Game::forge(array(
					'user' => Input::post('user'),
					'title' => Input::post('title'),
					'status' => Input::post('status'),
					'comment' => Input::post('comment'),
				));

				if ($game and $game->save())
				{
					Session::set_flash('success', 'Added '.$game->title.'.');

					Response::redirect('game');
				}

				else
				{
					Session::set_flash('error', 'Could not save game.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Games";
		$this->template->content = View::forge('game/create');

	}

	public function action_edit($id = null)
	{
		if($game = Model_Game::find($id)){

			$name = \Session::get('username');

			if(!($game->user == $name)) {
				// if logged in user tries to view another user's entry
				$id=null;
				Session::set_flash('error', 'Could not find that game!');
			}
		}

		is_null($id) and Response::redirect('game');

		if ( ! $game = Model_Game::find($id))
		{
			Session::set_flash('error', 'Could not find game #'.$id);
			Response::redirect('game');
		}

		$val = Model_Game::validate('edit');

		if ($val->run())
		{
			$game->user = Input::post('user');
			$game->title = Input::post('title');
			$game->status = Input::post('status');
			$game->comment = Input::post('comment');

			if ($game->save())
			{
				Session::set_flash('success', 'Updated ' . $game->title);

				Response::redirect('game');
			}

			else
			{
				Session::set_flash('error', 'Could not update ' . $game->title);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$game->user = $val->validated('user');
				$game->title = $val->validated('title');
				$game->status = $val->validated('status');
				$game->comment = $val->validated('comment');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('game', $game, false);
		}

		$this->template->title = "Games";
		$this->template->content = View::forge('game/edit');

	}

	public function action_delete($id = null)
	{
		if(!($name = \Session::get('username')))
		{
			$id = null;
		}

		is_null($id) and Response::redirect('game');

		if ($game = Model_Game::find($id))
		{

			if(!($game->user == $name)) {
				// if logged in user tries to delete another user's entry
				Session::set_flash('error', 'Could not find that game!');
			}else{

			$game->delete();

			Session::set_flash('success', 'Deleted '.$game->title);
			}
		}

		else
		{
			Session::set_flash('error', 'Could not delete '.$game->title);
		}

		Response::redirect('game');

	}
	

}
