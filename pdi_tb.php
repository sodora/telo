<?php
require 'common.php';

html_header('The TeloPIdb: Protein-DNA Interaction');
html_menu();
html_left();

echo <<<END
        <div class="title_center">Protein-DNA Interaction</div>
        <div class="box_center">
<table style="width:99%; min-width:800px;"><tr><td>
<table id="pdi_tb">
<thead>
<tr>
    <th>Protein Name</th>
    <th>Cell Line</th>
    <th>Method</th>
    <th>Pubmed</th>
    <th>ACC</th>
</tr>
</thead>
<tbody>
<tr>
    <td colspan="5" class="dataTables_empty">Loading data from server</td>
</tr>
</tbody>
<tfoot>
<tr>
    <th>Protein Name</th>
    <th>Cell Line</th>
    <th>Method</th>
    <th>Pubmed</th>
    <th>ACC</th>
</tr>
</tfoot>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $("#pdi_tb").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource":"data_tb.php",
        "fnServerParams": function(aoData){
            aoData.push({"name":"pTb", "value": "pdi_pich"})
        }
    });
});
</script>
</td></tr></table>
        </div>

END;

html_footer();
?>
