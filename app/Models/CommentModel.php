<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class CommentModel extends Model
 {
 protected $table = 'comments';
 protected $primaryKey = 'id';
 protected $allowedFields = ['content', 'user_id', 'card_id'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }