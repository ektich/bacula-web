{include file=header.tpl}

<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
         <div class="panel panel-default">
           <div class="panel-heading">Catalog statistics</div>
           <div class="panel-body">
             <h5>Client(s)<span class="label label-primary pull-right">{$clients_nb}</span></h5>
             <h5>Stored Bytes<span class="label label-primary pull-right">{$stored_bytes}</span></h5>
           </div> 
         </div>
      </div>
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading">Last period job status</div>
          <div class="panel-body">
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading">Last period job status</div>
          <div class="panel-body">
          </div>
        </div>
      </div>
    </div>
</div>

{include file=footer.tpl}
