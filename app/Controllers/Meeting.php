<?php
 namespace App\Controllers;
 use CodeIgniter\RESTful\ResourceController;
 use App\Services\IntegrationService;
 class Meeting extends ResourceController
 {
 protected $integrationService;
 public function __construct()
 {
 $this->integrationService = new IntegrationService();
 }
 public function createZoomMeeting()
 {
 $meetingDetails = $this->request->getVar('meetingDetails');
 $response =
 $this->integrationService->createZoomMeeting($meetingDetails);
 return $this->respond($response);
 }
 public function createTeamsMeeting()
 {
 $meetingDetails = $this->request->getVar('meetingDetails');
 $response =
 $this->integrationService->createTeamsMeeting($meetingDetails);
 return $this->respond($response);
 }
 public function createGoogleMeet()
 {
 $meetingDetails = $this->request->getVar('meetingDetails');
 $response =
 $this->integrationService->createGoogleMeet($meetingDetails);
 return $this->respond($response);
 }
 }