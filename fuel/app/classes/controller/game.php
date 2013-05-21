<?php
class Controller_Game extends Controller_Template{

	public function action_index()
	{
		$data['games'] = Model_Game::find('all');	// <!--NOTE: this needs to be changed once auth is in-->
		$this->template->title = "Games";
		$this->template->content = View::forge('game/index', $data);

	}

	public function action_view($id = null)
	{
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
		is_null($id) and Response::redirect('game');

		if ($game = Model_Game::find($id))
		{
			$game->delete();

			Session::set_flash('success', 'Deleted '.$game->title);
		}

		else
		{
			Session::set_flash('error', 'Could not delete '.$game->title);
		}

		Response::redirect('game');

	}
	

}
