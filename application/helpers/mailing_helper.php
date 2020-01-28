<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Mailing 
{
	private $ci;
	public function __construct()
	{

		$this->ci =& get_instance();
		$this->ci->load->library('email');
		$this->ci->email->initialize(array(
			'protocol' => 'smtp',
		  	'smtp_host' => 'smtp.sendgrid.net',
		  	'smtp_user' => 'Bmettrie',
		  	'smtp_pass' => 'Liselotte2013',
		  	'smtp_port' => 587,
		  	'crlf' => "\r\n",
		  	'newline' => "\r\n"
		));
	}

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
		$ci->email->set_mailtype("html");
		$ci->email->subject($mail->subject);
		$filename=APPPATH.'/assets/logo.png';
		$ci->email->attach($filename, 'inline');
		$cid = $ci->email->attachment_cid($filename);
		 $url=site_url('Users/forgotPassword?token='.$mail->token);
		 $data["url"]     	= 	$url;
		 $data["cid"]		=	$cid;
		 $data["name"]		=	$mail->name;
		$content= $ci->load->view("forgotpassword",$data,true);
		$ci->email->message($content);
		$ci->email->send();
		return $ci->email->print_debugger();
	}
public function sendActivationNotification($mail)
	{

		$this->ci->email->from($mail->from);
		$this->ci->email->to($mail->to);
		$this->ci->email->set_mailtype("html");
		$this->ci->email->subject($mail->subject);
		$filename=APPPATH.'/assets/logo.png';
		$this->ci->email->attach($filename, 'inline');
		$cid = $this->ci->email->attachment_cid($filename);
		$url=site_url('Users/register?token='.$mail->token);
		$data["url"]     	= 	$url;
		$data["cid"]		=	$cid;
		$data["email"]		=	$mail->to;
		$content 			= 	$this->ci->load->view("activateNotification",$data,true);
		$this->ci->email->message($content);
		$this->ci->email->send();
		return $this->ci->email->print_debugger();
	}

}
?>