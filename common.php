<?php

function connect_db() {
    $con = mysql_connect('localhost','ucsc','123456') or die('Could not open connection to server');
    return $con;
}

function html_header($title) {
    echo <<<END
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Description" />
<meta name="keywords" content="keywords1, keywords2" />
<title>
END;
    echo $title;
    echo <<<END
</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/jquery.dataTables.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</head>
<body>
<div id="page_wrapper">
    <div id="header_wrapper">
        <div id="header">
            <p>The TeloPIdb: Mammalian telomeric proteins Interaction Database</p>
        </div>

END;
}

function html_menu() {
    echo <<<END
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a>
                </li>
                <li><a href="#">Protein-Protein</a>
                    <ul style="display: none;">
                        <li><a href="ppi_tb.php">PICH</a></li>
                        <li><a href="ppi_st.php">Statistics</a></li>
                    </ul>
                </li>
                <li><a href="#">Protein-DNA</a>
                    <ul style="display: none;">
                        <li><a href="pdi_tb.php">PICH</a></li>
                        <li><a href="pdi_st.php">Statistics</a></li>
                    </ul>
                </li>
                <li><a href="#">Protein-RNA</a>
                    <ul style="display: none;">
                        <li><a href="pri_tb.php">PICH</a></li>
                        <li><a href="pri_st.php">Statistics</a></li>
                    </ul>
                </li>
                <li><a href="about.php">About</a>
                </li>
            </ul>
        </div>
<script type="text/javascript">
$("#nav ul li").find("a").mouseenter(function(e){
    e.stopPropagation();
    $(this).next().slideDown();
});
$("#nav ul li").mouseleave(function(){
    $(this).find("ul").slideUp();
});
</script>
    </div>

END;
}

function html_left() {
    echo <<<END
    <div id="left_side">
        <div class="title_side">News</div>
        <div class="box_side">
            <p>1. 2012/12. VirMir1.0 is now released ! </p>
        </div>
        <div class="title_side">Links</div>
        <div class="box_side">
            <p><a href="http://www.mirbase.org">miRbase</a></p>
        </div>
    </div>
    <div id="content">

END;
}

function html_footer() {
    echo <<<END
    </div>
    <div id="footer">
        <a href="index.php">Homepage</a> | <a href="contact.php">Contact us</a> 
    </div>
</div>
</body>
</html>

END;
}
?>
