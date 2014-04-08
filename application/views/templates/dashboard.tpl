{include file=header.tpl}

<div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="well well-sm">{$period_str}</div>
      </div>
      <div class="col-md-4">
        <form class="form-inline pull-right" role="form" method="post">
          <select name="period" class="form-control">
            {foreach from=$periods key=period_id item=period_label}
              <option value="{$period_id}"
              {if $period_id eq $period} selected {/if}> 
              {$period_label}
              </option>
            {/foreach}
          </select>
          <button type="submit" class="btn btn-default">Select</button>
        </form> 
      </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
         <div class="panel panel-default">
           <div class="panel-heading">Catalog statistics</div>
           <div class="panel-body">
             <h4>Client(s)<span class="label label-primary pull-right">{$clients_nb}</span></h4>
             <h4>Pool(s)<span class="label label-primary pull-right">{$pools_nb}</span></h4>
             <h4>Volume(s)<span class="label label-primary pull-right">{$volumes_nb}</h4>
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
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">Last period job status</div>
          <div class="panel-body">
          </div>
        </div>
      </div>
    </div>
</div>

{include file=footer.tpl}
