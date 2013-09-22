<?php
require 'common.php';

if(isset($_REQUEST['db'])) {
    $ppi_table = $_REQUEST['db'] . '_pdi_chip';
    $ppi_show = True;
} else {
    $ppi_show = False;
}

html_header('The TeloPIdb: Protein-DNA Interaction');
html_menu();
html_left();

echo <<<END
        <div class="title_center">Protein-DNA Interaction</div>
        <div class="box_center">
<script type="text/javascript">
$(document).ready(function(){
    $("#org").change(function(){
        if($('#org').val() == 'Human'){
            $('#db option').remove();
            $('#db').append('<option value="hg19">hg19</option>');
        } else if ($('#org').val() == 'Mouse'){
            $('#db option').remove();
            $('#db').append('<option value="mm10">mm10</option>');
        }
    });
});
</script>
<form name="mainForm" method="post">
<table>
    <tr>
        <td>Group</td>
        <td>Genome</td>
        <td>Assembly</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><select style="width:150px" name="clade"><option value="mammal" selected="selected">mammal</option></select></td>
        <td><select style="width:150px" name="org" id="org">
END;

if(isset($_REQUEST['org']) and $_REQUEST['org'] == 'Mouse') {
    echo '<option value="Human">Human</option><option value="Mouse" selected="selected">Mouse</option>';
    echo '</select></td><td><select style="width:150px" name="db" id="db"><option value="mm10">mm10</option></select></td>';
} else {
    echo '<option value="Human" selected="selected">Human</option><option value="Mouse">Mouse</option>';
    echo '</select></td><td><select style="width:150px" name="db" id="db"><option value="hg19">hg19</option></select></td>';
}

echo <<<END
        <td><input type="submit" value="Submit" /></td>
    </tr>
</table>
</form>
        </div>

END;

if($ppi_show) {
    echo '<div class="title_center">' . $_REQUEST['clade'] .' &gt; ' . $_REQUEST['org'] .' &gt; ' . $_REQUEST['db'] . '</div>';
    echo <<<END

        <div class="box_center">
<table style="width:99%; min-width:800px;"><tr><td>
<table id="ppi_tb">
<thead>
<tr>
    <th>Protein</th>
    <th>Position</th>
    <th>Gene</th>
    <th>Annotation</th>
    <th>P-value</th>
</tr>
</thead>
<tbody>
<tr>
    <td colspan="5" class="dataTables_empty">Loading data from server</td>
</tr>
</tbody>
<tfoot>
<tr>
    <th>Protein</th>
    <th>Position</th>
    <th>Gene</th>
    <th>Annotation</th>
    <th>P-value</th>
</tr>
</tfoot>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $("#ppi_tb").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource":"data_br.php",
        "fnServerParams": function(aoData){
END;

    echo 'aoData.push({"name":"pTb", "value": "' . $ppi_table;
    echo <<<END
"})}
    });
});
</script>
</td></tr></table>
        </div>

END;
    
}

html_footer();
?>
