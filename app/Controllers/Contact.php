<?php

namespace App\Controllers;

use CodeIgniter\Email\Email;


class Contact extends App_Controller {
    function __construct() {
        parent::__construct();
      
    }

    function index() {
        $data=[];
        if(session()->has('erro')){
            $data['erro']= session('erro');
        }
         return view('contact/index', $data);
    }

    function submit(){
        helper('form');
        helper('form-validation');
        
        if($this->request->getMethod() !== 'post'){
            return redirect()->to(site_url('home/index'));
        }
        
         
        $val = $this->validate([
             'nome' => 'required|min_length[10]|max_length[255]',
             'email'=>'required',
             'phone'=>'required',
             'assunto'=>'required',
             'mensagem'=>'required'
            ],[
                'nome'=>[
                    'required'=>'Campo Nome não pode ficar vazio.'
                    ],
                'email'=>[
                    'required'=>'Campo Email não pode ficar vazio.'
                ],
                 'phone'=>[
                    'required'=>'Campo Telefone não pode ficar vazio.'
                ],
                 'assunto'=>[
                    'required'=>'Campo Assunto não pode ficar vazio.'
                ],
                 'mensagem'=>[
                    'required'=>'Campo Mensagem não pode ficar vazio.'
                ]
            ]);
        if(!$val){
            return redirect()->back()->withInput()->with('erro',$this->validator);
        } else{
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validação de entrada
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email_input = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
            $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
        
            // Limpeza de dados
            $nome = htmlspecialchars($nome);
            $email_input = htmlspecialchars($email_input);
            $phone = htmlspecialchars($phone);
            $assunto = htmlspecialchars($assunto);
            $mensagem = htmlspecialchars($mensagem);
            
            }
            
          $email = new Email();

          $email->setTo('info@picpago.com.br');
          $email->setFrom($email_input);
          $email->setSubject($assunto);
          $email->setMessage(
              'Nome do cliente:' . $nome . '- ' . 
              'Email do Cliente: ' . $email_input . '- ' . 
              'Telefone do cliente' . $phone . '- ' . 
              'Mensagem do cliente' . $mensagem 
              );
        
            if ($email->send()) {
                return view('thanks/index');
            } else {
                return redirect()->back()->withInput()->with('erro',$this->validator);
            }
        }
       }

}












/* End of file Home.php */
/* Location: ./app/controllers/Home.php */