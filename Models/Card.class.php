<?php

class User {






    public static function get($table, $option = null, $id = null) {
        $db = DB::connect();
        // var_dump($db);
        // exit;

        if(!$option) {
            $query = "SELECT * FROM `$table`";
            $stmt = $db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $stmt = $db->prepare(
            "SELECT * FROM `$table` WHERE `$option` = ?"
        );

        $stmt->execute([
            $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}