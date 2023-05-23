<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $groups = $data['groups'];

        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$join_date', $groups)";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM members where id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data, $id)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $groups = $data['groups'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date = '$join_date', groups = $groups WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
