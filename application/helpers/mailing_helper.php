<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Mailing 
{

public function send($mail)
	{
		$ci =& get_instance();
	
		$ci->load->library('email');
		$ci->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'Bmettrie',
		  'smtp_pass' => 'Liselotte2013',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		$ci->email->from($mail->from);
		$ci->email->to($mail->to);
		$ci->email->subject($mail->subject);
		$ci->email->message($mail->message);
		$ci->email->send();
		return $ci->email->print_debugger();
	}

}
?>