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
       </table>
   </div>

  </div> <!-- row -->
</div> <!-- container -->

<script src="../../assets/js/docs.min.js"></script>

{include file=footer.tpl}
