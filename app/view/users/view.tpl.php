<?php

if (isset($user)) {
    $info = $user->getProperties();

    $editUrl = $this->url->create('users/edit/' . $info['id']);
    $activateUrl = $this->url->create('users/activate/' . $info['id']);
    $deactivateUrl = $this->url->create('users/deactivate/' . $info['id']);
    $softUrl = $this->url->create('users/soft-delete/' . $info['id']);
    $restoreUrl = $this->url->create('users/restore/' . $info['id']);
    $deleteUrl = $this->url->create('users/delete/' . $info['id']);
    $status = "";
    $statusDate = "";
    $action = "<a href='$editUrl' title='Redigera användare'><i class='fa fa-cog'></i></a>";
    if ($info['deleted'] != null) {
        $status = "Borttagen";
        $statusDate = $info['deleted'];
        $action .= " &nbsp; <a href='$restoreUrl' title='Återställ'><i class='fa fa-recycle'></i></a> &nbsp; <a href='$deleteUrl' title='Ta bort - OBS Går ej att ångra!'><i class='fa fa-times'></i></a>";
    } else if ($info['active'] == null) {
        $url = $this->url->create('users/activate/' . $info['id']);
        $status = "Inaktiverad";
        $action .= " &nbsp; <a href='$activateUrl' title='Aktivera'><i class='fa fa-check-circle-o'></i></a> &nbsp; <a href='$softUrl' title='Till papperskorgen'><i class='fa fa-trash'></i></a>";
    } else {
        $url = $this->url->create('users/deactivate/' . $info['id']);
        $status = "Aktiv";
        $action .= " &nbsp; <a href='$deactivateUrl' title='Inaktivera'><i class='fa fa-ban'></i></a> &nbsp; <a href='$softUrl' title='Till papperskorgen'><i class='fa fa-trash'></i></a>";
    }
?>

<h1>Visa användare: <?=$info['acronym']?></h1>

<h3><?=$info['name']?></h3>
<table>
    <tr>
        <td style="text-align: right;">Status:</td>
        <td><?=$status?></td>
    </tr>
    <tr>
        <td style="text-align: right;">Användarnamn:</td>
        <td><?=$info['acronym']?></td>
    </tr>
    <tr>
        <td style="text-align: right;">E-post:</td>
        <td><?=$info['email']?></td>
    </tr>
    <tr>
        <td style="text-align: right;">Skapad:</td>
        <td><?=$info['created']?></td>
    </tr>
<?php
    if ($info['updated'] != null) {
?>
    <tr>
        <td style="text-align: right;">Uppdaterad:</td>
        <td><?=$info['updated']?></td>
    </tr>
<?php
    }
    if ($info['deleted'] != null) {
?>
    <tr>
        <td style="text-align: right;">Borttagen: </td>
        <td><?=$info['deleted']?></td>
    </tr>
<?php
    }
?>
    <tr>
        <td style="text-align: right;">Åtgärd:</td>
        <td><?=$action?></td>
    </tr>
</table>

<?php
}
else {
?>

<h1><?=$title?></h1>

<p><?=$content?></p>

<?php
}
?>