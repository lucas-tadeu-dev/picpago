<?php

namespace App\Controllers;

use App\Models\Piccoin_model;
use App\Models\Transaction_model;
use CodeIgniter\Controller;


class Transaction extends Team_members
{
    
     public function index()
    {
       $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');
    
        $transactionModel = new Transaction_model();
    
    $data['transactions'] = $transactionModel->getUserTransactions($userId);
  
     return $this->template->rander('send_piccoin/transactions',$data);
    }

public function transfer()
{
    $session = session();  // Obtain the session instance
    $sender_id = $session->get('user_id');

    // Get the values from POST
    $receiver_id = $this->request->getPost('receiver_id');
    $amount = $this->request->getPost('amount');

    $db = \Config\Database::connect();
    $db->transStart();

    try {
        $model = new Piccoin_model();

        $sender = $model->where('user_id', $sender_id)->first();
        $receiver = $model->where('user_id', $receiver_id)->first();
        
        // Verifica se o valor da transação é maior que 1000
         if(abs($amount) > 10000){
            throw new \Exception('Erro! O valor da transação não pode ser maior que 10.000 PicCoins.');
        }

        // Verifica se o enviador tem saldo
       if ($sender && $sender['balance'] < $amount) {
        throw new \Exception('Erro! Saldo insuficiente.');
         }
         
         // Verifica se o valor é negativo e se o receiver tem saldo suficiente
         if($amount < 0 && $receiver && $receiver['balance'] < abs($amount)){
        throw new \Exception('Erro! O saldo do destinatário é insuficiente para a transferência.');
         }

        if($sender){
            $sender['balance'] -= $amount;
            $model->update($sender_id, ['balance' => $sender['balance']]);
        } else {
            //Insert logic if sender does not exist
            $model->insert(['user_id' => $sender_id, 'balance' => -$amount]);
        }

        if($receiver){
            $receiver['balance'] += $amount;
            $model->update($receiver_id, ['balance' => $receiver['balance']]);
        } else {
            //Insert logic if receiver does not exist
            $model->insert(['user_id' => $receiver_id, 'balance' => $amount]);
        }

        $transactionModel = new Transaction_model();
        $transactionModel->insert([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'amount' => $amount,
        ]);

         $db->transComplete();
    if ($db->transStatus() === FALSE) {
        throw new \Exception('A transação falhou.');
    } else {
        echo json_encode(array("success" => true, 'message' => 'Parabéns! '. $amount  .' PicCoins foram transferidas com sucesso!'));
    }
    } catch (\Exception $e) {
        $db->transRollback();
        echo json_encode(array("success" => false, 'message' => $e->getMessage()));
    }
}



  public function list_data() {
        $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');

        $model = new Transaction_model();
        $transactions = $model->get_transactions_list($userId);
        
        echo json_encode(array("data" => $transactions));
    }





// lista de transações
 public function userTransactions()
    {
        // Obtenha o id do usuário logado. Você pode precisar ajustar essa linha para o seu caso específico.
        $session = session();  // Obtain the session instance
        $userId = $session->get('user_id');

        // Crie uma nova instância do TransactionModel.
        $model = new Transaction_model();

        // Busque as transações do usuário.
        $data['transactions'] = $model->getUserTransactions($userId);

        // Carregue a view com os dados das transações.
        echo view('teste/index', $data);
    }


// add founds
public function upsertBalance()
    {
        // if ($this->request->getMethod() == 'post') {
            
            $session = session();  // Obtain the session instance
            $userId = $session->get('user_id'); 
            
             $balance = $this->request->getPost('balance');

            $model = new Piccoin_model();

            // Verifica se o usuário já existe
            $user = $model->find($userId);
             try {
            if ($user) {
                // Se o usuário já existir, atualiza o saldo
                $result = $model->updateBalance($userId, $balance);
            } else {
                // Se o usuário não existir, insere um novo registro
                $result = $model->insertBalance($userId, $balance);
            }
                 
             } catch (\Exception $e) {
                 // Passe a mensagem de erro para a view
            $data['error'] = $e->getMessage();
            return view('teste/index', $data);
             }

            // Você pode escolher como lidar com o resultado aqui
            // Neste exemplo, apenas retornamos o resultado como uma resposta JSON
            return $this->response->setJSON(['success' => $result]);
        }
    // }
    
    public function transfer_piccoins_after_payment($sender_id, $receiver_id, $amount)
{
    $db = \Config\Database::connect();

    $model = new Piccoin_model();
    $transactionModel = new Transaction_model();

    $sender = $model->where('user_id', $sender_id)->first();
    $receiver = $model->where('user_id', $receiver_id)->first();

    // Deduct amount from sender
    if($sender){
        $sender['balance'] -= $amount;
        $model->update($sender_id, ['balance' => $sender['balance']]);
    } else {
        $model->insert(['user_id' => $sender_id, 'balance' => -$amount]);
    }

    // Add amount to receiver
    if($receiver){
        $receiver['balance'] += $amount;
        $model->update($receiver_id, ['balance' => $receiver['balance']]);
    } else {
        $model->insert(['user_id' => $receiver_id, 'balance' => $amount]);
    }

    // Record the transaction
    $transactionModel->insert([
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'amount' => $amount,
    ]);
}


}
