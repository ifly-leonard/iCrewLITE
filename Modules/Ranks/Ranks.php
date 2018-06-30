<?php class Ranks extends CodonModule {

/*
 * Simple Staff module for phpVMS
 *
 * @author	Leonard Selvaraja
 * @link	https://icrewsystems.com | https://github.com/icrewsystems
 * @package	iCrew LITE v2
 * @updated on : 30.06.2018
 */
	public function index() {
	  if(!Auth::LoggedIn()) {
		  $this->render('login_form.php');
			return;
		}
		$this->render('Ranks/index.php');
	}

}

?>
