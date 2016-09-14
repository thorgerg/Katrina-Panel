<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{lang:pageName-pageTitle}</title>
  <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
    <link href="theme/default/main/css/main.css" rel="stylesheet" type="text/css" />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="javascript/sortable.js" type="text/javascript"></script>
    <script src="javascript/checkbox.js" type="text/javascript"></script>

</head>
<body>
    
    <div id="mainContainer">
        <div id="headerBar">
                      
            <div id="leftRivet">
                <img src="theme/default/main/images/rivets.png" alt="" />
            </div>
            
            
            <div id="rightRivet">
                <img src="theme/default/main/images/rivets.png" alt="" />
            </div>
            
            
            <div id="headerTitle">
                Intranet Server
            </div>
            
            
            <div id="search">
                <div id="searchLeft">
                    <img src="theme/default/main/images/searchLeft.png" alt="" />
                </div>
                
                <div id="searchRight">
                    <img src="theme/default/main/images/searchRight.png" alt="" />
                </div>
                
                <div id="searchCenter">
                    <form name="frmSearch" method="GET">
                        <input id="txtQuery" type="text" name="query" style="background-color: #7C7B7B; height: 18px; width: 100%; color: #FFFFFF; border: 0px;" />
                    </form>
                </div>
            </div>
            
            <div id="shortcuts">
                <a href="?p=home"><img src="theme/default/main/images/home-icon.png" alt="Home" /></a>
            </div> 
        </div>
        
        <a href="?p=home">
            <div id="headerBanner">
                <img id="bannerLeft" src="theme/default/main/images/bannerLeft.png" alt="Katrina Panel" />
                <img id="bannerRight" src="theme/default/main/images/bannerRight.png" alt="Katrina Panel" />
            </div>
        </a>
                
      
        
        <div id="content">
            {page}
        </div>
        
        
        <br />
        <br />
        
        <div id="footer">
            <a href="">KatrinaPanel</a> |
            <a href="">Documentation</a> |
            <a href="index.php?p=logout">Logout</a>
            
            <br />
            
            <div id="copyright">
                This software is provided free under the Creative Commons Open Source License
            </div>
        </div>
    </div>
</body>
</html>