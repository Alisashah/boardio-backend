<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class TicketModel extends Model
 {
 protected $table = 'tickets';
 protected $primaryKey = 'id';
 protected $allowedFields = ['user_id', 'title', 'description',
 'status', 'type', 'priority', 'created_by', 'assigned_to',
 'resolved_at'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }