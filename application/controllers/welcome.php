<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function login()
	{
	    // if this request is a form submission
	    if ($_POST)
	    {
	        // get form values and xss filter the input
            $identity = $this->input->post('identity', true);
            $password = $this->input->post('password', true);

            // if user is logged in successfully
            if($this->ion_auth->login($identity,$password)) 
            {
                // send on to protected area ('user' controller)
                redirect('user');
            }
            else // incorrect creds
            {
                // load up error
                $data['error'] = "Incorrect Credentials";
                
                // load form view again, with error
                $this->load->view('login_form', $data);
            }
	    }
	    else // show form view
	    {
            $this->load->view('login_form');
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */