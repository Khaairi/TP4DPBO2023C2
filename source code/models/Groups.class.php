<?php

class Groups extends DB
{
    function getGroups()
    {
        $query = "SELECT * FROM groups";
        return $this->execute($query);
    }

    function getGroupsById($id)
    {
        $query = "SELECT * FROM groups WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        $query = "INSERT INTO groups VALUES ('', '$name', 0)";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM groups where id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $name = $data['name'];

        $query = "UPDATE groups SET name='$name' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
