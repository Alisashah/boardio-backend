<?php
 namespace App\Models;
 use CodeIgniter\Model;
 class AnnouncementModel extends Model
 {
 protected $table = 'announcements';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'message',
 'target_audience', 'created_by'];
 protected $useTimestamps = true;
 protected $createdField = 'created_at';
 protected $updatedField = 'updated_at';
 protected $deletedField = 'deleted_at';
 protected $returnType = 'array';
 protected $useSoftDeletes = true;
 }