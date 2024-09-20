<?php
 namespace App\Services;
 use JiraRestApi\Configuration\ArrayConfiguration;
 use JiraRestApi\Issue\IssueService;
 use app\config\jira;
 class JiraService
 {
 protected $client;
 
 public function __construct()
 {
    $config = [
        'jiraHost' => config('jira.host'),
        'jiraUser' => config('jira.username'),
        'jiraPassword' => config('jira.password'),
    ];

    // Use dd to inspect the loaded config
    //dd(config());

    // The IssueService instantiation (once you confirm the values are correct)
     $this->client = new IssueService(new ArrayConfiguration($config));   

     //  $this->client = new IssueService(new ArrayConfiguration([
//  'jiraHost' => config('jira.host'),
//  'jiraUser' => config('jira.username'),
//  'jiraPassword' => config('jira.password'),
//  ]));

 }
 public function getIssues($jql)
 {
 return $this->client->search($jql);
 }
 }