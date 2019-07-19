<?php

class MailerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['useradmins_m', 'usuario', 'lugar', 'nota']);
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }


    public function process_preguntas_frecuentes()
    {
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');

      $this->form_validation->set_message('required', 'El campo {field} es requerido');
      $this->form_validation->set_message('valid_email', 'El campo {field} no tiene formato apropiado.');

      if ($this->form_validation->run() === false) {
          $this->load->helper('form');
          $this->session->set_flashdata('error', 'Complete los campos del formulario.');
          $data['content'] = 'frontend/'.$this->input->post('origen');
          $this->load->view('frontend_main', $data);
      } else {
        $this->process_email($this->input->post('asunto'),$this->input->post('hubermann@gmail.com'),$this->input->post('mensaje'),$this->input->post('origen'));
        $this->session->set_flashdata('success', 'Mensaje enviado!');
        redirect($this->input->post('origen'), 'refresh');
      }

    }

    public function process_quienes_somos()
    {
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');

      $this->form_validation->set_message('required', 'El campo {field} es requerido');
      $this->form_validation->set_message('valid_email', 'El campo {field} no tiene formato apropiado.');

      if ($this->form_validation->run() === false) {
          $this->load->helper('form');
          $this->session->set_flashdata('error', 'Complete los campos del formulario.');
          $data['content'] = 'frontend/'.$this->input->post('origen');
          $this->load->view('frontend_main', $data);
      } else {
        $this->process_email($this->input->post('asunto'),$this->input->post('hubermann@gmail.com'),$this->input->post('mensaje'),$this->input->post('origen'));
        $this->session->set_flashdata('success', 'Mensaje enviado!');
        redirect($this->input->post('origen'), 'refresh');
      }

    }


    public function process_como_funciona()
    {
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nombre', 'Nombre', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');

      $this->form_validation->set_message('required', 'El campo {field} es requerido');
      $this->form_validation->set_message('valid_email', 'El campo {field} no tiene formato apropiado.');

      if ($this->form_validation->run() === false) {
          $this->load->helper('form');
          $this->session->set_flashdata('error', 'Complete los campos del formulario.');
          $data['content'] = 'frontend/'.$this->input->post('origen');
          $this->load->view('frontend_main', $data);
      } else {
        $this->process_email($this->input->post('asunto'),$this->input->post('hubermann@gmail.com'),$this->input->post('mensaje'),$this->input->post('origen'));
        $this->session->set_flashdata('success', 'Mensaje enviado!');
        redirect($this->input->post('origen'), 'refresh');
      }

    }

    public function process_email($subject="email vacio", $to="hubermann@gmail.com",$message="", $page="formulario desconocido" )
    {
      $this->load->library('email');


      $config['protocol'] = 'sendmail';
      $config['mailpath'] = '/usr/sbin/sendmail';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = TRUE;

      $this->email->initialize($config);

      $this->email->from('hubermann@gmail.com', 'Desde codeigniter');
      $this->email->to('hubermann@gmail.com');
      #$this->email->cc('another@another-example.com');
      #$this->email->bcc('them@their-example.com');

      $this->email->subject('Email Test');
      $this->email->message('Testing the email class.');

      $this->email->send();

    }

}
