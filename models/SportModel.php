<?php

class SportModel extends Model
{

    public function getActiveSession()
    {
        try {
            $sql = "SELECT * FROM sessions WHERE date_to >= CURDATE()";
            return $this->query($sql)[0];
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function getCountSummary($column, $id)
    {
        try {
            $sql = "SELECT SUM($column) AS total FROM sport_data WHERE session_id = $id";
            $result = $this->query($sql)[0];
            return $result['total'];
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }
}
