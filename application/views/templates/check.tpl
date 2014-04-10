{include file=header.tpl}

<div class="container-fluid">
  <div class="row">

        <div class="col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php?page=Settings">Settings</a></li>
            <li class="active"><a href="index.php?page=Check">Requirements</a></li>
          </ul>
        </div>

   <div class="col-md-6 main">
     <h4>Requirements</h4>
       <table class="table table-striped">
         <tr>
           <td>PHP Gettext support</td> 
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_gettext}"></span>
           </td>
         </tr>  
         <tr>
           <td>PHP Session</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_session}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP GD</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_gd}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP PDO</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_pdo}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP MySQL</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_mysql}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP PostgreSQL</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_postgresql}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP SQLite</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_sqlite}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP version (current {$php_version_no})</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_version}"></span>
           </td>
         </tr>
         <tr>
           <td>PHP Timezone (current {$php_timezone_str})</td>
           <td class="text-center">
             <span class="glyphicon glyphicon-{$php_timezone}"></span>
           </td>
         </tr>
       </table>
   </div>

  </div> <!-- row -->
</div> <!-- container -->

<script src="../../assets/js/docs.min.js"></script>

{include file=footer.tpl}
