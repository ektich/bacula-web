{include file=header.tpl}

<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
         <div class="panel panel-default">
           <div class="panel-heading">Catalog statistics</div>
           <div class="panel-body">
             <h4>Client(s)<span class="label label-primary pull-right">{$clients_nb}</span></h4>
             <h4>Pool(s)<span class="label label-primary pull-right">{$pools_nb}</span></h4>
             <h4>Stored Bytes<span class="label label-primary pull-right">{$stored_bytes}</span></h4>
             <h4>Stored Files<span class="label label-primary pull-right">{$stored_files}</span></h4>
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
