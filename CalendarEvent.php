<?php


class CalendarEvent
{
    private $required = ['topic','date','duration'];
    private $optional = ['id', 'user_id', 'created_at', 'deleted_at', 'edited_at', 'type', 'place', 'time', 'comment'];
    private $data = array();
    private $errors = array();
    private $isCorrect ;
    private $user;
    protected static $table = 'events';
    private static $attributes =  ['topic', 'user_id', 'date', 'duration', 'id', 'created_at', 'deleted_at', 'edited_at', 'type', 'place', 'finished_at', 'comment'];
    private static $toPrint = ['topic', 'type', 'date', 'duration', 'place', 'comment'];
    public static $rus_attributes = [
        'topic' => 'событие',
        'type' => 'тип',
        'date' => 'дата',
        'duration' => 'длительность',
        'place' => 'место',
        'comment' => 'комментарий'
    ];
    private static $types = [
        1 => 'Встреча',
        2 => 'Звонок',
        3 => 'Совещание',
        4 => 'Дело',
        5 => 'Другое'
    ];

    private static $durations = [
        1 => '15 минут',
        2 => '30 минут',
        3 => '1 час',
        4 => '3 часа',
        5 => 'Весь день'
    ];


    public function init($array) {
        $this->isCorrect = true;
        $this->user = Session::get('user');
        $this->data['user_id'] = $this->user->getId();
        foreach(self::$attributes as $attr) {

           if (isset($array[$attr])) {
               $this->data[$attr] = $array[$attr];
            }
        }
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
//        var_dump($this->data);

    }
    private function validate() {
    }

    public function get_errors(): array {
        return $this->errors;
    }

    public function has_errors(): bool {
        if  (count($this->errors) !== 0) {
            return true;
        }
        return false;
    }

    public static function get_columns(): array
    {
        return self::$toPrint;
    }


    public function getData(): array
    {
        $data = array();

        foreach (self::$toPrint as $tpr) {
            $data[$tpr] = $this->data[$tpr];
        }
        $data['type'] = self::$types[$data['type']];
        $data['duration'] = self::$durations[$data['duration']];
        return $data;
    }

    public function get_raw_data(): array
    {
        $data = array();

        foreach (self::$toPrint as $tpr) {
            $data[$tpr] = $this->data[$tpr];
        }
        $data['t' . $data['type']] = 'selected';
        $data['d' . $data['duration']] = 'selected';
        $time = explode(' ', $data['date']);
        $data['date'] = $time[0] . 'T' . $time[1];
        return $data;
    }

    private function fill() {
        foreach (self::$attributes as $attr) {
            if (!array_key_exists(strval($attr), $this->data)) {
                $this->data[strval($attr)] = null;
            }
        }
//        $this->data['date'] = $this->data['date'] . ' ' . $this->data['time'];
    }


    public function save(){
        $this->fill();
        if ($this->isCorrect) {
            $sql = Database::get_pdo()->prepare('INSERT INTO `events` (`' . implode('`, `', static::$attributes) . '`) VALUES (:' . implode(', :', static::$attributes) . ');');
            $sql->execute($this->data);
        }
    }

    public function fill_copy($array){
        foreach ($array as $key => $value) {
            $this->data[$key] = $value;
//            echo $value . "<br>";
        }
    }

    private function get_attr_data(){
        $d = array();
        foreach (self::$attributes as $key => $value) {

        }
        foreach (self::$attributes as $attr) {
            $d[$key] = $value;
        }
        return $d;
    }

    public function alter($array){
        $this->fill_copy($array);


        $this->data['edited_at'] = date('Y-m-d H:i:s');

        $stmt  = Database::get_pdo()->prepare("UPDATE `events` SET `topic`= :topic, `user_id` = :user_id, `date` = :date, `duration` = :duration, `created_at` = :created_at, `deleted_at` = :deleted_at, `edited_at` = :edited_at, `type` = :type, `place` = :place, `finished_at` = :finished_at, `comment` = :comment WHERE `id`= :id");

        $d = array();

        for ($i = 0; $i < count(self::$attributes); $i++) {
            $d[self::$attributes[$i]] = $this->data[self::$attributes[$i]];
        }

        echo "<br><br><br><br>";
        $stmt->execute($d);
        $stmt->debugDumpParams();

    }

    public function get_id(){
        return $this->data['id'];
    }
}
