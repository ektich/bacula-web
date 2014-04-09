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
           <td></td> 
           <td class="success">ok</td>
         </tr>  
         <tr>
           <td>Test 2</td>
           <td class="success">
             <span class="glyphicon glyphicon-ok"></span>
           </td>
         </tr>  
         <tr>
           <td>Test 3</td>
           <td class="warning">
             <span class="glyphicon glyphicon-remove"></span>
           </td>
         </tr>  
         <tr>
           <td>Test 4</td>
           <td class="danger text-center">
             <span class="glyphicon glyphicon-remove"></span>
           </td>
         </tr>  
       </table>
   </div>

  </div> <!-- row -->
</div> <!-- container -->

<script src="../../assets/js/docs.min.js"></script>

{include file=footer.tpl}
