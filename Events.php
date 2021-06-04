<?php



class Events
{
    private $events = array();
    private static $date = [
        1 => ' `date` is NOT NULL',
        2 => '`date` = CURDATE()',
        3 => '`date` = CURDATE() + INTERVAL 1 DAY'
    ];

    private static $status = [
        1 => '`finished_at` is not NULL',
        2 => '`finished_at` is NULL'
    ];

    private static $expired = [
        1 => '`date` < CURDATE() and `finished_at` is NULL',
    ];


    public function getTable ($conditions) {
        $user = Session::get('user');
        if (is_null($user)){
            header("Location:login.php");
        } else {

            $query = 'SELECT * FROM `events` WHERE `user_id` = :login';
            if (array_key_exists('date', $conditions)) {
                $query .= ' and ' . self::$date[$conditions['date']];
            }

            if (array_key_exists('status', $conditions)) {
                $query .= ' and ' . self::$status[$conditions['status']];
            }

            if (array_key_exists('expired', $conditions)) {
                $query .= ' and ' . self::$expired[$conditions['expired']];
            }

            $find_sql = Database::get_pdo()->prepare($query);
            $find_sql->bindParam(':login', $user->getId());


            $find_sql->execute();
//            $find_sql->debugDumpParams();

            $found_values = $find_sql->fetchAll();
//            var_dump($found_values);

            foreach ($found_values as $val) {
                $a = new CalendarEvent();
                $a->init($val);
                array_push($this->events, $a);
            }
//            var_dump($this->events);
            return $this->createTable();
        }
        $data = '';
    }


    public function createTable() {
        $table = '';
        $table .= '<table class="table is-fullwidth" >';

        //table head
        $attributes = CalendarEvent::get_columns();
        $table .= '<thead>';
        $table .= '<tr>';
        foreach ($attributes as $attr) {
            $table .= '<th><p>';
            $table .= $attr;
            $table .= '</p></th>';
        }
        $table .= '</tr>';
        $table .= '</thead>';

        //content
//        var_dump($this->events);
        foreach ($this->events as $event) {
            $table .= '<tr>';
            $data = $event->getData();
            echo "<br><br>";
            foreach ($attributes as $attr) {
                $table .= '<td>';
                $table .= $data[$attr];
                $table .= '</td>';
            }
                $table .= '</tr>';
        }

        $table .= '</table>';
        return $table;
    }
}