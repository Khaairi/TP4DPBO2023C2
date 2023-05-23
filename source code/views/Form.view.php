<?php
include_once("conf.php");
include_once("models/Members.class.php");

class FormView
{
    public function render($id_edit, $data)
    {
        if ($id_edit == -1) {
            $option = null;
            foreach ($data['groups'] as $val) {
                list($id, $name, $members) = $val;
                $option .= "<option value='" . $id . "'>" . $name . "</option>";
            }

            $data = '
            <form method="POST" action="index.php">

            <br><br>
            <div class="card mb-5">

                <div class="card-header bg-primary">
                    <h1 class="text-white text-center">Create New Member</h1>
                </div><br>
                    <label> NAME: </label>
                    <input type="text" name="name" class="form-control"> <br>

                    <label> EMAIL: </label>
                    <input type="text" name="email" class="form-control"> <br>

                    <label> PHONE: </label>
                    <input type="text" name="phone" class="form-control"> <br>
                    
                    <label> JOIN DATE: </label>
                    <input type="date" name="join_date" class="form-control"> <br>

                    <label for="groups">GROUP: </label>
                    <select class="custom-select form-control" name="groups">
                        <option value="" disabled selected hidden>Select Group</option>
                        "' . $option . '"
                    </select>
            
                <button class="btn btn-success mt-4" type="submit" name="submit"> Submit </button><br>
                    <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                </div>
            </form>';

            $tpl = new Template("templates/form.html");
            $tpl->replace("FORM", $data);
            $tpl->write();
        } else {
            $option = null;
            $group = 0;
            $datas = null;

            foreach ($data['members'] as $val) {
                list($id, $name, $email, $phone, $join_date, $groups) = $val;
                $group = $groups;
            }

            foreach ($data['groups'] as $val) {
                list($id, $name, $members) = $val;
                if ($group == $id) {

                    $option .= "<option value='" . $id . "' selected>" . $name . "</option>";
                } else {

                    $option .= "<option value='" . $id . "'>" . $name . "</option>";
                }
            }

            foreach ($data['members'] as $val) {
                list($id, $name, $email, $phone, $join_date, $groups) = $val;
                $datas = '
                    <form method="POST" action="index.php">

                    <br><br>
                    <div class="card mb-5">

                        <div class="card-header bg-primary">
                            <h1 class="text-white text-center">Update Member</h1>
                        </div><br>
                            <input type="hidden" name="id" value="' . $id_edit . '">
                            <label> NAME: </label>
                            <input type="text" name="name" class="form-control" value="' . $name . '"> <br>

                            <label> EMAIL: </label>
                            <input type="text" name="email" class="form-control" value="' . $email . '"> <br>

                            <label> PHONE: </label>
                            <input type="text" name="phone" class="form-control" value="' . $phone . '"> <br>
                            
                            <label> JOIN DATE: </label>
                            <input type="date" name="join_date" class="form-control" value="' . $join_date . '"> <br>

                            <label for="groups">GROUP: </label>
                            <select class="custom-select form-control" name="groups">
                                "' . $option . '"
                            </select>
                    
                    <button class="btn btn-success mt-4" type="submit" name="edit">Update</button><br>
                            <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

                        </div>
                    </form>';
            }

            $title = 'Update Member';
            $tpl = new Template("templates/form.html");
            $tpl->replace("FORM", $datas);
            $tpl->replace("TITLE", $title);
            $tpl->write();
        }
    }
}
