<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class AutomationModel extends Model
 {
 protected $table = 'automations';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'trigger', 'action',
 'board_id'];
protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }