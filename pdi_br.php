<?php
require 'common.php';

$asmb = array('hg19'=>'Human', 'mm10'=>'Mouse');
$prot = array('trf1'=>'TRF1', 'trf2'=>'TRF2', 'tpp1'=>'TPP1', 'tin2'=>'TIN2', 'rap1'=>'RAP1', 'pot1'=>'POT1');

if(isset($_REQUEST['db']) and isset($_REQUEST['protein'])) {
    $pdi_table = $_REQUEST['db'] . '_chip_' . $_REQUEST['protein'];
    $pdi_show = True;
} else {
    $pdi_show = False;
}

html_header('The TeloPIN: Protein-DNA Interaction');
html_menu();
html_left();

echo <<<END
        <div class="title_center">Protein-DNA Interaction</div>
        <div class="box_center">
<form name="mainForm" method="post">
<table>
    <tr>
        <td>Group</td>
        <td>Species</td>
        <td>Protein</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <select style="width:180px" name="clade"><option value="Mammal" selected="selected">Mammal</option></select>
        </td>
        <td>
            <select style="width:180px" name="db" id="db">
END;

foreach($asmb as $asm_k=>$asm_v) {
    if(isset($_REQUEST['db']) and $_REQUEST['db'] == $asm_k) {
        echo "<option value=\"$asm_k\" selected=\"selected\">$asm_v</option>";
    } else {
        echo "<option value=\"$asm_k\">$asm_v</option>";
    }
}


echo <<<END
</select>
        </td>
        <td>
            <select style="width:180px" name="protein">
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
        <td>
            <input type="submit" value="Submit" />
        </td>
    </tr>
</table>
</form>
        </div>

END;

if($pdi_show) {
    echo '<div class="title_center">' . $_REQUEST['clade'] .' &gt; ' . $asmb[$_REQUEST['db']] . '</div>';
    echo <<<END

        <div class="box_center">
<table style="width:99%; min-width:800px;"><tr><td>
<table id="pdi_tb">
<thead>
<tr>
    <th>Protein</th>
    <th>Position</th>
    <th>Gene</th>
    <th>Distance</th>
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
    <th>Distance</th>
    <th>Annotation</th>
    <th>P-value</th>
</tr>
</tfoot>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $("#pdi_tb").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource":"data_br.php",
        "fnServerParams": function(aoData){
END;

    echo 'aoData.push({"name":"pTb", "value": "' . $pdi_table;
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
