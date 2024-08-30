<?php
 namespace App\Services;
 use Config\IntegrationConfig;
 class IntegrationService
 {
 protected $config;
 public function __construct()
 {
 $this->config = new IntegrationConfig();
 }
 public function createZoomMeeting($meetingDetails)
 {
 // Implement Zoom meeting creation logic here
 }
 public function createTeamsMeeting($meetingDetails)
 {
 // Implement Teams meeting creation logic here
 }
 public function createGoogleMeet($meetingDetails)
 {
 // Implement Google Meet creation logic here
 }
 }