<?php
require 'common.php';

$prot = array('trf1'=>'TRF1', 'trf2'=>'TRF2', 'tpp1'=>'TPP1', 'tin2'=>'TIN2', 'rap1'=>'RAP1', 'pot1'=>'POT1');

if(isset($_REQUEST['db']) and isset($_REQUEST['protein'])) {
    $ppi_table = $_REQUEST['db'] . '_pdi_' . $_REQUEST['protein'];
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
        <td>Protein</td>
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

        <td>
            <select style="width:150px" name="protein">

END;

foreach($prot as $pro_k=>$pro_v) {
    if(isset($_REQUEST['protein']) and $_REQUEST['protein'] == $pro_k) {
        echo "<option value=\"$pro_k\" selected=\"selected\">$pro_v</option>";
    } else {
        echo "<option value=\"$pro_k\">$pro_v</option>";
    }
}

echo <<<END
            </select>
        </td>
        <td><input type="submit" value="Submit" /></td>
    </tr>
</table>
</form>
        </div>

END;

if($ppi_show) {
    echo '<div class="title_center">' . $_REQUEST['clade'] .' &gt; ' . $_REQUEST['org'] .' &gt; ' . $_REQUEST['db'] .' &gt; ' . $prot[$_REQUEST['protein']] . '</div>';
    echo <<<END

        <div class="box_center">
<table style="width:99%; min-width:800px;"><tr><td>
<table id="ppi_tb">
<thead>
<tr>
    <th>Protein Name</th>
    <th>Species</th>
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
    <th>Species</th>
    <th>Method</th>
    <th>Pubmed</th>
    <th>ACC</th>
</tr>
</tfoot>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $("#ppi_tb").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource":"data_tb.php",
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
