<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index(){		
		$data['title'] = 'Contact';
		$data['page'] = 'contact';
		$data['content'] = 'contact';


		$this->load->view('site/template', $data);
	}

	function submit(){
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = 'Contact From Website mdi.vc';
            $html = "Name: $name \r\n"."Email: $from_email \r\n"."Message:\r\n".$message;

            //set to_email id to which you want to receive mails
            // $to_email = 'info@mdi.vc';

            //configure email settings
            // $config['protocol'] = 'smtp';
            // $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            // $config['smtp_port'] = '465';
            // $config['smtp_user'] = 'metradigitalinvestama@gmail.com';
            // $config['smtp_pass'] = 'metra12345';
            // $config['mailtype'] = 'html';
            // $config['charset'] = 'iso-8859-1';
            // $config['wordwrap'] = TRUE;
            // $config['newline'] = "\r\n"; //use double quotes
            $this->load->library('email');
            // $this->email->initialize($config);                        

            //send mail
            $this->email->from('metradigitalinvestama@gmail.com', 'MDI Website');
            $list = array('info@mdi.vc');
            $this->email->to($list);
            $this->email->subject('Contact from '.$from_email.' to mdi.vc');
            // $this->email->from($from_email, $name);
            // $this->email->to($to_email);
            // $this->email->subject($subject);
            $this->email->message($html);
            if ($this->email->send())
            {
                echo "<script>";
                echo "alert('Your mail has been sent successfully!');";
                echo 'window.location = "'.$_SERVER["HTTP_REFERER"].'";';
                echo "</script>";
            }
            else
            {
                echo "<script>";
                echo "alert('There is error in sending mail! Please try again later');";
                echo 'window.location = "'.$_SERVER["HTTP_REFERER"].'";';
                echo "</script>";
            }	
            
            // echo $this->email->print_debugger();
	}

    public function email_test()
     {

        $name = $this->input->post('name');
        $email  = $this->input->post('email');
        $company= $this->input->post('company');
        $message= $this->input->post('message');        

        $name = 'fahmilu kurniawan';
        $email  = 'fahmilu@gmail.com';
        $company= 'redcomm';
        $message= 'test email';

        $this->load->library('email');

        // $config['protocol'] = "smtp"; 
        // $config['smtp_host'] = "ssl://smtp.googlemail.com";
        // $config['smtp_port'] = "465";
        // $config['smtp_user'] = "metradigitalinvestama@gmail.com"; 
        // $config['smtp_pass'] = 'metra12345';
        // $config['charset'] = "iso-8859-1";
        // $config['wordwrap'] = TRUE;
        // $config['mailtype'] = "html";
        // $config['newline'] = "\r\n";

        // $this->email->initialize($config);

        $this->email->from('metradigitalinvestama@gmail.com', 'MDI Portfolio Day');
        $list = array('fahmilu@gmail.com');
        $this->email->to($list);
        $this->email->subject('Contact From Website redcomm.co.id');

        $mail_data = "";

        $html = "Name: $name \r\n"."Email: $email \r\n"."Company: $company \r\n"."Pesan:\r\n".$message;
        $this->email->message($html);
        $this->email->send();    
        
        echo $this->email->print_debugger();
     }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */