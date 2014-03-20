{include file=header.tpl}

<div class="container">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">{$exception_header}</h3>
    </div>
    <div class="panel-body">
      <p>{$exception_message}</p>
    </div>

    <table class="table">
    <thead>
      <tr>
        <th>File</th>
        <th>Line</th>
        <th>Function</th>
      </tr>
    </thead>

    <tbody>    
      {foreach from=$exception_traces item=trace}
        <tr>
          <td>{$trace.file}</td>
          <td>{$trace.line}</td> 
          <td>{$trace.class}{$trace.type}{$trace.function}</td>
        </tr>
      {/foreach}
     </tbody>
  </table> 

    <div class="panel-footer">
      Have you try to run the <a href='test.php'>test page</a> ? <br />
      Check the online documentation on <a href='http://www.bacula-web.org' target='_blank'>Bacula-Web project site</a> <br />
      Rebort a bug or suggest a new feature in the <a href='http://bugs.bacula-web.org' target='_blank'>Bacula-Web\'s bugtracking tool</a>
    </div>
  </div>

</div>
{include file=footer.tpl}
