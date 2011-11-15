<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    private $the_user;  //  <-------<--------<--------<-------<--------
                                                                    // ^
    public function __construct()                                   // ^
    {                                                               // ^
        parent::__construct();                                      // ^
                                                                    // ^
        // if the person accessing this controller is logged in     // ^
        if($this->ion_auth->logged_in()) {                          // ^
                                                                    // ^
            // get the user object                                  // ^
            $data->the_user = $this->ion_auth->user()->row();       // ^
                                                                    // ^
            // put the user object in class wide property--->---->-----
            $this->the_user = $data->the_user;
            
            // load $the_user in all displayed views automatically
            $this->load->vars($data);
        }
        else // person not logged in
        {
            // send back to the root site
            redirect('/');
        }
    }

    public function index()
    {
        $this->load->view('user_view');
    }


    public function logout()
    {
        // log current user out and send back to public root
        $this->ion_auth->logout();
        redirect('/');
    }
}