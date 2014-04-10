<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bacula-Web - {$page_name}</title>

  <!-- Bootstrap front-end framework -->
  <link rel="stylesheet" type="text/css" href="core/external/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="core/external/bootstrap/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>

<body>
<!-- Bootstrap header -->
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     <a class="navbar-brand" href="index.php">Bacula-Web</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	 <ul class="nav navbar-nav">
	  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?page=Dashboard">Dashboard</a><li>
            <li class="divider"></li>
            <li><a href="index.php?page=Jobs">Last jobs</a></li>
            <li><a href="index.php?page=Pools">Pools and volumes</a></li>
            <li class="divider"></li>
            <li><a href="#">Jobs grid</a></li>
            <li class="divider"></li>
            <li><a href="#">Backup job</a></li>
          </ul>
        </li>
	 </ul>
	 
      <ul class="nav navbar-nav navbar-right">

	  {if $catalog_nb > 1}

	  <!-- Bacula catalog dropdown -->
	  <li>
	   <form class="navbar-form" action="index.php" method="post">
	   <select name="catalog_id" class="form-control">
		   {foreach from=$catalogs key=catalog_id item=catalog_name}
             <option value="{$catalog_id}"
             {if $catalog_id eq $catalog_selected_id} selected {/if} > 
               {$catalog_name}
             </option>
           {/foreach}
	   </select>
            <button type="submit" class="btn btn-success">Use</button>
            {$catalog_selected_id}
	  </form>
	   </li>
	   {/if}

	   <li>
		  <a href="#" title="Refresh"><span class="glyphicon glyphicon-refresh"></span></a>
	   </li>
	   
	   <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <span class="glyphicon glyphicon-cog"></span>
		</a>

		 <ul class="dropdown-menu">
		  <li role="presentation" class="dropdown-header">Tools</li>
		  <li> <a href="index.php?page=Settings" title="Current settings">Settings</a></li>
		  <li> <a href="index.php?page=Check" title="Check requirements">Check</a></li>
		  <li role="presentation" class="divider"></li>
		  <li role="presentation" class="dropdown-header">Help</li>
		  <li> <a href="http://www.bacula-web.org" target="_blank">Official web site</a> </li>
		  <li> <a href="http://bugs.bacula-web.org" target="_blank">Bug tracker</a> </li>
		  <li role="presentation" class="divider"></li>
		  <li role="presentation" class="dropdown-header">Version</li>
		  <li class="disabled"> <a href="#">Bacula-Web 6.x.x</a></li>
		 </ul>
	   </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--
<div id="header">
 <div id="toolbar_top">
  <div class="toolbar_box right_box">
   <ul>
	<li> <a href="http://bugs.bacula-web.org" target="_blank" title="Bugs and features tracker">Bugs</a> </li>
	<li> <a href="http://www.bacula-web.org" target="_blank" title="Visit the official web site">About</a> </li>
	<li>Version 6.0.0</li>
   </ul>
  </div> 
  <div class="clear_both"></div>
 </div> <!-- end div toolbar_top -->

 <!-- <div id="header_main">
  <!-- Navigation page -->
  <!--
  <div class="toolbar_box left_box">
    <a href="index.php" title="Dashboard"> <img src="application/view/style/images/home_w.png" alt=""> </a>
  </div>
  <!-- Page name -->
  <!--
  <div class="toolbar_box left_box page_name">
    {$page_name}
  </div>
  
  <!-- Application name -->
  <!--
  <div class="toolbar_box right_box">
   <div class="app_name">Bacula-Web</div>
  </div>
  <div class="clear_both"></div>
 </div>

<!-- Top Toolbar -->
<!-- <div id="top_controls">
  <!-- Back link -->
 <!-- <div class="toolbar_box left_box">
    <ul>
      <li>
        {php} 
	  $back	    = null;
          $referrer = $_SERVER['HTTP_REFERER'];
          $referrer = end( explode( "/", $referrer) );

          $current  = $_SERVER['SCRIPT_FILENAME'];
	  $current  = end( explode( "/", $current) );
  
          // If referrer and current are not equal and referrer isn't null/empty
	  if( strcmp($referrer, $current) != 0  ) 
 	    $back = $referrer;

          // If current is Dashboard
          if( $current == 'index.php' )
	    $back = null;

          if( !is_null($back) )
   	    echo "<a href='$back' title='back to previous page'>Back</a>";
	{/php}
      </li>
    </ul>
  </div>

  <div class="toolbar_box right_box">
   <!-- Condifitional catalog selection if more than 1 catalog is defined in the configuration -->
<!--    {if $catalog_nb > 1}
      <form class="catalog_selector" method="post" action="index.php">
        Catalog {html_options name=catalog_id options=$catalogs selected={$catalog_current_id} onchange="submit();"}
          <noscript><input type="submit" value="Select"></noscript>
      </form>
    {/if}
  </div>

  <div class="clear_both"></div>
</div>
<!-- end Top controls -->

<!-- </div> <!-- end header -->
