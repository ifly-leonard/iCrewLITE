<?php class Privacy extends CodonModule {
	/*
	 * Privacy Policy module for phpVMS
	 *
	 * @author	Leonard Selvaraja
	 * @link	https://icrewsystems.com | https://github.com/icrewsystems
	 * @package	iCrew LITE v2
	 *
	 */

	public function index() {
		if(!Auth::LoggedIn()) {
		  $this->render('login_form.php');
			return;
		}
		$this->render('privacy.php');
  }
}
