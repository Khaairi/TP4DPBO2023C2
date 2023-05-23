<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Groups.controller.php");

$groups = new GroupsController();

if (isset($_POST['submit'])) {

    $groups->add($_POST);
} else if (!empty($_GET['id_delete'])) {

    $id = $_GET['id_delete'];
    $groups->delete($id);
} else if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];
    $groups->index($id);
} else if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $groups->edit($_POST, $id);
} else {

    $id = null;
    $groups->index($id);
}
