
<?php

class My_session extends CI_Session {

	public function checkAuth(){
		$CI = &get_instance();
		// check user is allowed to view the page
		// for now, determined by the first URI string.
		$URI = explode("/", uri_string());
		$level = $CI->pages_model->getAuthLevel($URI[0]);
		if($level == 'login'){
			if( $CI->session->userdata('logged_in') == true )
				return true;
		}
		if($level == 'vendor'){
			if( 	strtolower($CI->session->userdata('userRole')) == 'admin' 	
			||	strtolower($CI->session->userdata('userRole')) == 'vendor' 	)
				return true;
		}
		if($level == 'admin'){ 
			if(	strtolower($CI->session->userdata('userRole')) == 'admin')
				return true;
		}
		if($level == 'buyer'){
			if(	strtolower($CI->session->userdata('userRole')) == "admin"
			||	strtolower($CI->session->userdata('userRole')) == "buyer" )
				return true;
		}	
		if($level == FALSE)	// Default: allow the user onto the page. 
			return true;
			
		redirect('error/forbidden');
	}				

        public function __construct(){
                parent::__construct();
                $CI = &get_instance();
		$CI->load->library('session');
                $CI->load->model('users_model');
		$CI->load->model('sessions_model');
		$CI->load->model('pages_model');

                if($CI->session->userdata('logged_in') === TRUE){
			$userHash = $CI->session->userdata('userHash');
                        $sessionInfo = $CI->sessions_model->getInfo($userHash);
                        if(time()-$sessionInfo['last_activity'] > 1800){
                                // half an hour before time out 
                                $this->killSession($userHash);
                                redirect('users/logoutInactivity');
                        } else {
                                $CI->sessions_model->updateSession($userHash);
                        }
		}
		$this->checkAuth();
	}	

        public function createSession($user){
                $CI = &get_instance();
                $sessionData = array( 	'id' => $user['id'],
					'userHash' => $user['userHash'],
                                        'userRole' => $user['userRole'],
                                        'logged_in' => TRUE,
                                        'last_activity' => time()
                                    );
                $CI->session->set_userdata($sessionData);

        }

        public function killSession(){
                $CI = &get_instance();

                $CI->sessions_model->killSession($CI->session->userdata('userHash'));
		$CI->session->unset_userdata('id');
                $CI->session->unset_userdata('userHash');
                $CI->session->unset_userdata('userRole');
                $CI->session->unset_userdata('logged_in');
                $CI->session->unset_userdata('last_activity');
                session_destroy();
        }

}

