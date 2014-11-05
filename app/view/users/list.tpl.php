
<h1><?=$title?></h1>

<p><?=$selector?></p>

<table>
    <tr>
        <th>Namn</th>
        <th>Användarnamn</th>
        <th>E-post</th>
        <th>Status</th>
        <th>Åtgärd</th>
    </tr>

<?php foreach ($users as $user) {


$info = $user->getProperties();

$editUrl = $this->url->create('users/edit/' . $info['id']);
$activateUrl = $this->url->create('users/activate/' . $info['id']);
$deactivateUrl = $this->url->create('users/deactivate/' . $info['id']);
$softUrl = $this->url->create('users/soft-delete/' . $info['id']);
$restoreUrl = $this->url->create('users/restore/' . $info['id']);
$deleteUrl = $this->url->create('users/delete/' . $info['id']);
$userUrl = $this->url->create('users/id/' . $info['id']);
$status = "";
$action = "<a href='$editUrl' title='Redigera användare'><i class='fa fa-cog'></i></a>";
if( $info['deleted'] != null ) {
    $status = "<span style='color: red;'>Borttagen</span>";
    $action .= " &nbsp; <a href='$restoreUrl' title='Återställ'><i class='fa fa-recycle'></i></a> &nbsp; <a href='$deleteUrl' title='Ta bort - OBS Går ej att ångra!'><i class='fa fa-times'></i></a>";
} else if( $info['active'] == null ) {
    $status = "Inaktiv";
    $action .= " &nbsp; <a href='$activateUrl' title='Aktivera'><i class='fa fa-check-circle-o'></i></a> &nbsp; <a href='$softUrl' title='Till papperskorgen'><i class='fa fa-trash'></i></a>";
} else {
    $status = "<span style='color: green;'>Aktiv</span>";
    $action .= " &nbsp; <a href='$deactivateUrl' title='Inaktivera'><i class='fa fa-ban'></i></a> &nbsp; <a href='$softUrl' title='Till papperskorgen'><i class='fa fa-trash'></i></a>";
}

echo <<<EOD
    <tr>
        <td><a href="$userUrl">{$info['name']}</a></td>
        <td>{$info['acronym']}</td>
        <td>{$info['email']}</td>
        <td>$status</td>
        <td>$action</td>
    </tr>
EOD;

} ?>

</table>
