<?php
class HomeController extends BaseController {

	public function showWelcome()
	{
		return View::make('base');
	}

	public function showSecret()
	{
		return View::make('secret');
	}
}
