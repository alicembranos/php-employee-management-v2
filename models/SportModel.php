<?php

class SportModel extends Model
{

    public function getActiveSession()
    {
        try {
            $sql = "SELECT * FROM sessions WHERE date_to >= CURDATE()";
            if ($this->query($sql)) {
                return $this->query($sql)[0];
            }
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

    public function getRanking($column, $id)
    {
        try {
            $sql = "SELECT sport_data.employee_id, sport_data.$column, employees.name FROM sport_data INNER JOIN employees ON sport_data.employee_id = employees.employee_id WHERE sport_data.session_id = $id ORDER BY sport_data.$column DESC LIMIT 5";
            $result = $this->query($sql);
            return $result;
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }

    public function updateGoal($date_to, $goal, $session_id)
    {
        $data = array();
        array_push($data, $date_to);
        array_push($data, $goal);
        array_push($data, $session_id);
        try {
            $sql = "UPDATE sessions SET date_to = ?, goal = ? WHERE session_id = ?";
            $this->query($sql, $data, false);
            $sql = "SELECT * FROM sessions WHERE session_id = $session_id";
            $result = $this->query($sql)[0];
            return $result;
        } catch (PDOException $e) {
            new ErrorController($e->getMessage());
        }
    }
}
