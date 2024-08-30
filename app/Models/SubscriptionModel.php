<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class SubscriptionModel extends Model
 {
 protected $table = 'subscriptions';
 protected $primaryKey = 'id';
 protected $allowedFields = ['tenant_id', 'plan_name', 'price',
 'start_date', 'end_date', 'status'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }