<?php
include_once("conf.php");
include_once("models/Groups.class.php");
include_once("views/Groups.view.php");

class GroupsController
{
    private $groups;

    function __construct()
    {
        $this->groups = new Groups(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index($id)
    {
        $this->groups->open();
        $this->groups->getGroups();

        $data = array(
            'groups' => array(),
            'specific' => array()
        );

        while ($row = $this->groups->getResult()) {
            array_push($data['groups'], $row);
        }

        if (!empty($id)) {
            $this->groups->getGroupsById($id);

            while ($row = $this->groups->getResult()) {
                array_push($data['specific'], $row);
            }
        }

        $this->groups->close();

        $view = new GroupsView();
        $view->render($data, $id);
    }

    public function add($data)
    {
        $this->groups->open();
        $this->groups->add($data);
        $this->groups->close();

        header("location:group.php");
    }

    public function delete($id)
    {
        $this->groups->open();
        $this->groups->delete($id);
        $this->groups->close();

        header("location:group.php");
    }

    public function edit($data, $id)
    {
        $this->groups->open();
        $this->groups->update($data, $id);
        $this->groups->close();

        header("location:group.php");
    }
}
