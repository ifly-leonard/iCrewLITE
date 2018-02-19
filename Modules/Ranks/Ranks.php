<?php class Ranks extends CodonModule {
////////////////////////////////////////////
// 	Comes with iCrew LITE Freeware Skin.  //
//  @Updated on : 19.02.2018              //
//  @Author : Leonard Selvaraja           //
////////////////////////////////////////////


	public function index() {
	  if(!Auth::LoggedIn()) {
		  $this->render('login_form.php');
			return;
		}
		$this->render('Ranks/index.php');
	}

}

?>
