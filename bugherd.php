<?php
//	error_reporting(E_ALL);
/**
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   BugHerd
 * @package    BugHerd Viewer
 * @author     Generation Labs https://github.com/GenerationLabs
 * @copyright  2015 Generation Labs LLC
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    1.0
 * @link        https://github.com/GenerationLabs/bugherd-viewer
 */
 

 
 
 // ENTER KEY Below AND YOU ARE DONE!

function herd($path, $method = 'GET',array $data =null, $key ='ufwjkhh66ahkx2skjbhana')
    {
        //$this->responseCode = null;
       // $this->getPort($this->url.$path);
        $data = json_encode($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_USERPWD, $key.':x');
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, 'https://www.bugherd.com/api_v2/'.$path.'.json');
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       

        $httpHeader = array();
        $httpHeader[] = 'Content-Type: application/json';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpHeader);

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                if (isset($data)) {curl_setopt($curl, CURLOPT_POSTFIELDS, $data);}
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                if (isset($data)) {curl_setopt($curl, CURLOPT_POSTFIELDS, $data);}
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default: // GET
                break;
        }
        $response = curl_exec($curl);
       
        
        curl_close($curl);

        if ($response) {
            return json_decode($response,true);
        }

        return true;
    }



$organization = herd('organization');
 sleep(3);
$projects = herd('projects');
 sleep(3);
//print_r($projects);

?>
 
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>BugHerd Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <style>
	    /* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 * Global add-ons
 */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top {
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
  }
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 * Main content
 */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 * Placeholder dashboard ideas
 */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;
}
</style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php  echo $organization[organization][name]; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
         
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Projects</a></li>
            <?php $i=0; foreach($projects[projects] as $proj){
	            echo '<li><a href="#">'.$proj[name].'</a></li>';
	            $projectque[$i][id] = $proj[id];
	            $projectque[$i][name] = $proj[name];
	            $i++;
            } ?>
            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Project</th>
                  <th>Priority</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
	              <?php 
		              foreach($projectque as $tasks){
			              
			              $task = herd('projects/'.$tasks[id].'/tasks');
			              //print_r($task);
			              foreach($task[tasks] as $ta){
				              
				              if($ta[priority_id] == 0){
					              $priority = 'N/A';
					              $color = '';
				              }elseif($ta[priority_id] == 1){
					              $priority = 'Critial';
					              $color = 'danger';
				              }elseif($ta[priority_id] == 2){
					              $priority = 'Important';
					              $color = 'warning';
				              }elseif($ta[priority_id] == 3){
					              $priority = 'info';
					              $color = '';
				              }elseif($ta[priority_id] == 4){
					              $priority = 'Minor';
					              $color = '';
				              }
				              
				              
				              if($ta[status_id] == 0){
					              $status = 'Backlog';
					              
				              }elseif($ta[status_id] == 1){
					              $status = 'Todo';
				              }elseif($ta[status_id] == 2){
					              $status = 'Doing';
				              }elseif($ta[status_id] == 4){
					              $status = 'Done';
				              }elseif($ta[status_id] == 5){
					              sleep(3);
					              continue;
				              }
				              
				              ?>
				              <tr class="<?php echo $color; ?>">
					              <td><?php echo $ta[local_task_id]; ?></td>
					              <td><?php echo $ta[description]; ?></td>
					              <td><?php echo $tasks[name]; ?></td>
					              <td><?php echo $priority; ?></td>
					              <td><?php echo $status; ?></td>
				              </tr>
				              
				              <?php
			              }
			              
			              
			              sleep(3);
		              }
		              
		              ?>
		              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

	<script>
		$(document).ready( function () {
	    $('.table-striped').DataTable();
	} );
	</script>

  </body>
</html>

 
 
 
