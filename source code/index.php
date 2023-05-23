<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (!empty($_GET['create'])) {

  $id = $_GET['create'];
  $members->create($id);
} else if (!empty($_GET['id_edit'])) {

  $id = $_GET['id_edit'];
  $members->create($id);
} else if (isset($_POST['submit'])) {

  $members->add($_POST);
} else if (isset($_POST['edit'])) {

  $id = $_POST['id'];
  $members->edit($_POST, $id);
} else if (!empty($_GET['id_delete'])) {

  $id = $_GET['id_delete'];
  $members->delete($id);
} else {

  $members->index();
}
