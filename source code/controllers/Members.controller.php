<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Groups.class.php");
include_once("views/Members.view.php");
include_once("views/Form.view.php");

class MembersController
{
    private $members;
    private $groups;

    function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->groups = new Groups(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->members->getMembers();

        $data = array(
            'members' => array()
        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        $this->members->close();

        $view = new MembersView();
        $view->render($data);
    }

    public function create($id)
    {
        $this->groups->open();
        $this->groups->getGroups();

        $this->members->open();
        $this->members->getMembersById($id);

        $data = array(
            'groups' => array(),
            'members' => array()
        );

        while ($row = $this->groups->getResult()) {
            array_push($data['groups'], $row);
        }

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        $this->groups->close();
        $this->members->close();

        $view = new FormView();
        $view->render($id, $data);
    }

    public function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    public function edit($data, $id)
    {
        $this->members->open();
        $this->members->update($data, $id);
        $this->members->close();

        header("location:index.php");
    }

    public function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
