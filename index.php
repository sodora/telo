<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Description" />
<meta name="keywords" content="keywords1, keywords2" />
<title>The TeloPIdb</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
<div id="page_wrapper">
    <div id="header_wrapper">
        <div id="header">
            <p>The TeloPIdb: Mammalian telomeric proteins Interaction Database</p>
        </div>
        <div id="nav">
            <ul>
                <li><a href="index.html">Home</a>
                </li>
                <li><a href="#">Protein-Protein</a>
                    <ul style="display: none;">
                        <li><a href="#">sonmenu2</a>
                        <li><a href="#">sonmenu2</a>
                    </ul>
                </li>
                <li><a href="#">Protein-DNA</a>
                    <ul style="display: none;">
                        <li><a href="#">sonmenu5</a></li>
                    </ul>
                </li>
                <li><a href="#">Protein-RNA</a>
                </li>
                <li><a href="about.html">About</a>
                </li>
            </ul>
        </div>
<script type="text/javascript">
$("#nav ul li").find("a").mouseenter(function(e){
    e.stopPropagation();
    $(this).next().slideDown('fast');
});
$("#nav ul li").mouseleave(function(){
    $(this).find("ul").slideUp('fast');
});
</script>
    </div>
    <div id="left_side">
      <h3 align="center">News</h3>
      <div class='box_side'>
        <p>1. 2012/12. VirMir1.0 is now released ! </p>
      </div>

      <h3 align="center">Links</h3>
      <div class='box_side'>
        <p><a href="http://www.mirbase.org">miRbase</a></p>
      </div>
    </div>

    <div id="content">
        <h3>What is VirMir? </h3>
        <div class='box_center'>
            <p>Introduction of VirMir</p>
        </div>
        <h3>What can I get from VirMir? </h3>
        <div class='box_center'>
            <p>introduction about this platform </p>
        </div>
        <h3>What can I get from VirMir? </h3>
        <div class='box_center'>
            <p>introduction about this platform </p>
        </div>
    </div>

    <div id="footer">
        <a href="index.html">Homepage</a> | 
        <a href="contact.html">Contact us</a> 
    </div>
</div>
</body>
</html>
