<?php
include_once("conf.php");
include_once("models/Groups.class.php");

class GroupsView
{
    public function render($data, $id_edit)
    {
        $dataGroups = null;
        foreach ($data['groups'] as $val) {
            list($id, $name, $members) = $val;
            $dataGroups .= "<tr>
            <td>" . $id . "</td>
            <td>" . $name . "</td>
            <td>" . $members . "</td>
            <td>
                <a class='btn btn-success' href='group.php?id_edit=$id'>Edit</a>
                <a class='btn btn-danger' href='group.php?id_delete=$id'>Delete</a>
            </td>
            </tr>";
        }

        if (empty($id_edit)) {
            $form = '<div class="card-body">
            <form method="post" id="data" action="group.php">
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Group Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            </form>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success" name="submit" form="data">Add</button>
                <button type="reset" class="btn btn-danger" form="data">Cancel</button>
            </div>';

            $title = 'Add';
        } else {

            $form = null;

            foreach ($data['specific'] as $val) {
                list($id, $name, $members) = $val;
                $form = '<div class="card-body">
                <form method="post" id="data" action="group.php">
                <div class="mb-3 row">
                    <input type="hidden" name="id" value="' . $id_edit . '">
                    <label for="name" class="col-sm-4 col-form-label">Group Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="' . $name . '">
                    </div>
                </div>
                </form>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success" name="edit" form="data">Edit</button>
                    <button type="reset" class="btn btn-danger" form="data">Cancel</button>
                </div>';
            }

            $title = 'Update';
        }


        $tpl = new Template("templates/groups.html");
        $tpl->replace("DATA_TABEL", $dataGroups);
        $tpl->replace("FORM", $form);
        $tpl->replace("TITLE", $title);
        $tpl->write();
    }
}
