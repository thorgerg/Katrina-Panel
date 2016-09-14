
<div id="sidebarLeft">
<div class="sidebarContainer">
    <div class="headerBar">
        <img class="leftRivet" src="theme/default/login/images/rivets.png" alt="" />
                    
        <div class="headerTitle">
            {lang:errorLogs-headerTitle}
        </div>
                    
        <img class="rightRivet" src="theme/default/login/images/rivets.png" alt="" />
    </div>
    <div class="row rowStyle">
            <div class="label"><h3><a href="index.php?p=errorLog&type=apache">{lang:errorLogs-apache}</a></h3></div>
    </div>
    <div class="row rowStyle">
            <div class="label"><h3><a href="index.php?p=errorLog&type=mysql">{lang:errorLogs-mysql}</a></h3></div>
    </div>
    <div class="row rowStyle">
            <div class="label"><h3><a href="index.php?p=errorLog&type=mail">{lang:errorLogs-mail}</a></h3></div>
    </div>
</div>
</div>
<div class="errorContent">
    <div class="headerBar">
        <img class="leftRivet" src="theme/default/login/images/rivets.png" alt="" />
                    
        <div class="headerTitle">
            {lang:errorLogs-content}
        </div>
                    
        <img class="rightRivet" src="theme/default/login/images/rivets.png" alt="" />
    </div>
    <div class="scrollable">
        <?php
        if ($log){
            printLog($log);
        }
        ?>
    </div>
</div>
    