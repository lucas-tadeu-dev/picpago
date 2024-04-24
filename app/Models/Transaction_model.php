<?php 

namespace App\Models;

use CodeIgniter\Model;

class Transaction_model extends Model
{
    protected $table = 'rise_transactions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['sender_id', 'receiver_id', 'amount', 'timestamp'];
    

public function getUserTransactions($userId)
{
    $builder = $this->db->table('rise_transactions');
    $builder->select('rise_transactions.id, rise_transactions.amount, 
    DATE_SUB(rise_transactions.timestamp, INTERVAL 3 HOUR) as timestamp, 
    sender.first_name as sender_name, receiver.first_name as receiver_name');
    $builder->join('rise_users as sender', 'rise_transactions.sender_id = sender.id', 'left');
    $builder->join('rise_users as receiver', 'rise_transactions.receiver_id = receiver.id', 'left');
    $builder->groupStart();
    $builder->where('sender_id', $userId);
    $builder->orWhere('receiver_id', $userId);
    $builder->groupEnd();
    $builder->orderBy('rise_transactions.timestamp', 'DESC');
    $query = $builder->get();
    
    return $query->getResultArray();
}




}
