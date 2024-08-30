<?php
 namespace App\Services;
use Config\StorageConfig;
 class StorageService
 {
 protected $config;
 public function __construct()
 {
 $this->config = new StorageConfig();
 }
 public function upload($file, $storageType = 'local')
 {
 $storageConfig =
 $this->config->storageOptions[$storageType];
 switch ($storageType) {
 case 'local':
 return $this->uploadToLocal($file, $storageConfig);
 case 'google_drive':
 return $this->uploadToGoogleDrive($file,
 $storageConfig);
 case 'aws_s3':
 return $this->uploadToAWSS3($file, $storageConfig);
 case 'mega':
 return $this->uploadToMega($file, $storageConfig);
 default:
 throw new \Exception('Unsupported storage type');
 }
 }
 protected function uploadToLocal($file, $config)
 {
 $filePath = $config['root'] . '/' . $file->getName();
 $file->move($config['root']);
 return $filePath;
 }
 protected function uploadToGoogleDrive($file, $config)
 {
 // Implement Google Drive upload logic here
 }
 protected function uploadToAWSS3($file, $config)
 {
 // Implement AWS S3 upload logic here
 }
 protected function uploadToMega($file, $config)
 {
 // Implement Mega upload logic here
 }
 }
