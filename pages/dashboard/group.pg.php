
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:group-title}</h3>

<div class="line">
</div>

<br />

<form method="POST">
    <table width="100%" cellspacing="0" cellpading="0" id="fileTable">
        <thead>
            <tr>
                <td>{lang:group-name}</td>
                <td>{lang:group-permissions}</td>
                <td>{lang:group-users}</td>
            </tr>
        </thead> 
        <?php
            echo $data;
        ?>
</table>

</form>

</div>