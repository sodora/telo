<?php
require 'common.php';

$asmb = array('hg19'=>'Human', 'mm10'=>'Mouse');
$prot = array('terra'=>'TERRA', 'terc'=>'TERC');

if(isset($_REQUEST['db']) and isset($_REQUEST['rna'])) {
    $pri_table = $_REQUEST['db'] . '_pri_' . $_REQUEST['rna'];
    $pri_show = True;
} else {
    $pri_show = False;
}

html_header('The TeloPIN: Protein-RNA Interaction');
html_menu();
html_left();

echo <<<END
        <div class="title_center">Protein-RNA Interaction</div>
        <div class="box_center">
<form name="mainForm" method="post">
<table>
    <tr>
        <td>Group</td>
        <td>Species</td>
        <td>RNA</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><select style="width:180px" name="clade"><option value="Mammal" selected="selected">Mammal</option></select></td>
        <td>
            <select style="width:180px" name="db">
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
            <select style="width:180px" name="rna">
END;

foreach($prot as $pro_k=>$pro_v) {
    if(isset($_REQUEST['rna']) and $_REQUEST['rna'] == $pro_k) {
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

if($pri_show) {
    echo '<div class="title_center">' . $_REQUEST['clade'] .' &gt; ' . $asmb[$_REQUEST['db']] .' &gt; ' . $prot[$_REQUEST['rna']] . '</div>';
    echo <<<END

        <div class="box_center">
<table style="width:99%; min-width:800px;"><tr><td>
<table id="pri_tb">
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
    $("#pri_tb").dataTable({
        "bProcessing":true,
        "bServerSide":true,
        "sAjaxSource":"data_tb.php",
        "fnServerParams": function(aoData){
END;

    echo 'aoData.push({"name":"pTb", "value": "' . $pri_table;
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
