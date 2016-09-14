
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:user-title}</h3>

<div class="line">
</div>

<br />

<form method="POST">
    <table width="100%" cellspacing="0" cellpading="0" id="fileTable">
        <thead>
            <tr>
                <td>{lang:user-name}</td>
                <td>{lang:user-email}</td>
                <td>{lang:user-language}</td>
                <td>{lang:user-lastIP}</td>
                <td>{lang:user-lastLogin}</td>
                <td>{lang:user-creationDate}</td>
                <td>{lang:user-groupName}</td>
            </tr>
        </thead> 
        <?php
            echo $data;
        ?>
</table>

</form>

</div>