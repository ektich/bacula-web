<?php

/*
  +-------------------------------------------------------------------------+
  | Copyright 2010-2012, Davide Franco                                              |
  |                                                                         |
  | This program is free software; you can redistribute it and/or           |
  | modify it under the terms of the GNU General Public License             |
  | as published by the Free Software Foundation; either version 2          |
  | of the License, or (at your option) any later version.                  |
  |                                                                         |
  | This program is distributed in the hope that it will be useful,         |
  | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
  | GNU General Public License for more details.                            |
  +-------------------------------------------------------------------------+
 */
session_start();
include_once( 'core/global.inc.php' );

// Initialise model and view
$view = new CView();
$dbSql = new Bweb($view);

$clientid = '';
$client = '';
$period = '';
$client_jobs = array();
$backup_jobs = array();
$days_stored_bytes = array();
$days_stored_files = array();

$job_levels = array('D' => 'Differential', 'I' => 'Incremental', 'F' => 'Full');

$http_post = CHttpRequest::getRequestVars($_POST);
$http_get = CHttpRequest::getRequestVars($_GET);

if (isset($http_post['client_id']))
    $clientid = $http_post['client_id'];
elseif (isset($http_get['client_id']))
    $clientid = $http_get['client_id'];
else
    die("Application error: Client not specified ");

// Backup period
if (isset($http_post['period']))
    $period = $http_post['period'];
else
    die("Please specify a backup period");

// Client informations
$client = $dbSql->getClientInfos($clientid);

$job_names = $dbSql->getJobsName($clientid);

foreach ($job_names as $jobname) {
    //Client's backup jobs
    $query = 'SELECT Job.Name, Job.Jobid, Job.Level, Job.Endtime, Job.Jobbytes, Job.Jobfiles, Status.JobStatusLong FROM Job ';
    $query .= "LEFT JOIN Status ON Job.JobStatus = Status.JobStatus ";
    $query .= "WHERE Job.Name = '$jobname' AND Job.JobStatus = 'T' AND Job.Type = 'B' ";
    $query .= 'ORDER BY Job.EndTime DESC ';
    $query .= 'LIMIT 1';

    $jobs_result = $dbSql->db_link->runQuery($query);

    foreach ($jobs_result->fetchAll() as $job) {
        $job['level'] = $job_levels[$job['level']];
        $job['jobfiles'] = $dbSql->translate->get_Number_Format($job['jobfiles']);
        $job['jobbytes'] = CUtils::Get_Human_Size($job['jobbytes']);

        $backup_jobs[] = $job;
    }
}

$view->assign('backup_jobs', $backup_jobs);

// Get the last 7 days interval (start and end)
$days = CTimeUtils::getLastDaysIntervals($period);

// ===============================================================
// Last 7 days stored Bytes graph
// ===============================================================  
$graph = new CGraph("graph2.png");

foreach ($days as $day) {
    $stored_bytes = $dbSql->getStoredBytes($day['start'], $day['end'], 'ALL', $clientid);
    $stored_bytes = CUtils::Get_Human_Size($stored_bytes, 1, 'GB', false);
    $days_stored_bytes[] = array(date("m-d", $day['start']), $stored_bytes);
}

$graph->SetData($days_stored_bytes, 'bars');
$graph->SetGraphSize(400, 230);
$graph->SetYTitle("GB");

$graph->Render();
$view->assign('graph_stored_bytes', $graph->get_Filepath());

// ===============================================================
// Getting last 7 days stored files graph
// ===============================================================
$graph = new CGraph("graph3.png");

foreach ($days as $day) {
    $stored_files = $dbSql->getStoredFiles($day['start'], $day['end'], 'ALL', $clientid);
    $days_stored_files[] = array(date("m-d", $day['start']), $stored_files);
}

$graph->SetData($days_stored_files, 'bars');
$graph->SetGraphSize(400, 230);
$graph->SetYTitle("Files");

$graph->Render();
$view->assign('graph_stored_files', $graph->get_Filepath());

$view->assign('period', $period);
$view->assign('client_name', $client['name']);
$view->assign('client_os', $client['os']);
$view->assign('client_arch', $client['arch']);
$view->assign('client_version', $client['version']);

// Process and display the template
$view->render('client-report.tpl');
?>
