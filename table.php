<?php
$a_tb = array("POT1","TRF1","TRF2","RAP1","TPP1","TIN2");
$bn_html = "";
$tb_html = "";
$js_html = "";
$js2_html = "$(document).ready(function(){";
for ( $i=0 ; $i<count($a_tb) ; $i++ )
{
    $bn_html .= "<td style=\"width:100px;text-align:center;\" id=\"BN_" .  $a_tb[$i] . "\" class=\"bnData\"><a href=\"#\">" . $a_tb[$i] . "</a></td>\n";

    $tb_html .= "<div style=\"display:none;\" id=\"VIEW_" . $a_tb[$i] . "\" class=\"tbData\">\n";
    $tb_html .= "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" id=\"" . $a_tb[$i] . "\">\n";
    $tb_lines = <<<END
<thead>
<tr>
    <th style="width:10%;">Protein Name</th>
    <th style="width:20%;">Full Name</th>
    <th style="width:10%;">Species</th>
    <th style="width:10%;">Method</th>
    <th style="width:40%;">Pubmed</th>
    <th style="width:10%;">ACC</th>
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
    <th>Full Name</th>
    <th>Species</th>
    <th>Method</th>
    <th>Pubmed</th>
    <th>ACC</th>
</tr>
</tfoot>
</table>
</div>
END;
    $tb_html .= $tb_lines;

    $js_html .= '$(document).ready(function(){$("#' . $a_tb[$i] . '").dataTable({"bProcessing":true,"bServerSide":true,"sAjaxSource":"table_data.php?pTb=' . $a_tb[$i] . '"});});';

    $js2_html .= '$("#BN_' . $a_tb[$i] . '").click(function(){';
    $js2_html .= '$(".bnData").css("background-color","#FFFFFF");';
    $js2_html .= '$(".tbData").hide();';
    $js2_html .= '$("#VIEW_' . $a_tb[$i] . '").show();';
    $js2_html .= '$("#BN_' . $a_tb[$i] . '").css("background-color","#D3D6FF")});';
}
$js2_html .= "});";

$js3_html = '$("#VIEW_' . $a_tb[0] . '").show();$("#BN_' . $a_tb[0] . '").css("background-color","#D3D6FF");';

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Short description of your site here." />
<meta name="keywords" content="keywords, go, here, seperated, by, commas" />
<title>Virus miRNA platform</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/jquery.dataTables.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</head>
<body>
<div id="page_wrapper">
    <div id="header_wrapper">
        <div id="header">
            <h1 align="center">A Platform for Virus microRNA Prediction </font></h1>
        </div>
        <div id="navcontainer">
            <ul id="navlist">
                <li><a href="index.php">Home</a></li>
                <li><a href="browser.cgi">Browser</a></li>
                <li id="active"><a href="table.php" id="current">Table</a></li>
            </ul>
        </div>
    </div>

    <div id="left_side">
      <h3 align="center">News</h3>
      <div class='featurebox_side'>
        <p>1. 2012/12. VirMir1.0 is now released ! </p>
      </div>

      <h3 align="center">Links</h3>
      <div class='featurebox_side'>
        <p align="center"><a href="http://www.mirbase.org">miRbase</a></p>
        <p align="center"><a href="http://www.mdc-berlin.de/en/research/research_teams/systems_biology_of_gene_regulatory_elements/projects/miRDeep/">miRDeep</a></p>
            <p align="center"><a href="http://159.226.126.177/mirpara/">miRpara</a></p>
            <p align="center"><a href="http://www.ncbi.nlm.nih.gov">NCBI</a></p>
            <p align="center"><a href="http://bowtie-bio.sourceforge.net">Bowtie</a></p>
            <p align="center"><a href="http://rfam.sanger.ac.uk/">Rfam</a></p>
        <p align="center"><a href="http://bowtie-bio.sourceforge.net">DeepBase</a></p>
        <p align="center"><a href="http://dsap.cgu.edu.tw/">DSAP</a></p>
      </div>
    </div>

    <div id="content">
        <div class='featurebox_center'>
            <table>
                <tr>
<?php echo $bn_html; ?>
                </tr>
            </table>
        </div>
        <br />
        <div class='featurebox_center'>
        <table style="width:99%; min-width:800px;">
            <tr>
                <td>
<?php echo $tb_html; ?>
                </td>
            </tr>
        </table>
        </div>
    </div>
    <script type="text/javascript">
<?php echo $js2_html; ?>
<?php echo $js_html; ?>
<?php echo $js3_html; ?>
    </script>
    <div id="footer">
    <a href="index.html">Homepage</a> |
    <a href="contact.html">Contact us</a>
    </div>
</div>
</body>
</html>
