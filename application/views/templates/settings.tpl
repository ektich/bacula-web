{include file=header.tpl}

<div class="container-fluid">
  <div class="row">

        <div class="col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php?page=Settings">Settings</a></li>
            <li><a href="index.php?page=Check">Requirements</a></li>
          </ul>
        </div>

   <div class="col-md-6 main">
     <h4>Settings</h4>
       <table class="table table-striped">
         <tr>
           <td>Language</td> 
           <td >{$language}</td>
         </tr>  
         <tr>
           <td>Show inactive clients</td>
           <td>{$show_inactive_clients}</td>
         </tr>  
         <tr>
           <td>Hide empty pools</td>
           <td>{$hide_empty_pools}</td>
         </tr>  
         <tr>
           <td>Jobs per page</td>
           <td>{$jobs_per_page}</td>
         </tr>  
         <tr>
           <td>Configured catalogs</td>
           <td>{$catalogs_nb}</td>
         </tr>
       </table>
   </div>

  </div> <!-- row -->
</div> <!-- container -->

{include file=footer.tpl}
