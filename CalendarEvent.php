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
    private static $attributes =  ['topic', 'user_id', 'date','duration', 'id', 'created_at', 'deleted_at', 'edited_at', 'type', 'place', 'finished_at', 'comment'];
    private static $toPrint = ['topic', 'type', 'date', 'duration', 'place', 'comment'];

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

    private function fill() {
        foreach (self::$attributes as $attr) {
            if (!array_key_exists(strval($attr), $this->data)) {
                $this->data[strval($attr)] = null;
            }
        }
    }





    public function save(){
        $this->fill();
        if ($this->isCorrect) {
            $sql = Database::get_pdo()->prepare('INSERT INTO `events` (`' . implode('`, `', static::$attributes) . '`) VALUES (:' . implode(', :', static::$attributes) . ');');
            $sql->execute($this->data);
        }
    }
}
