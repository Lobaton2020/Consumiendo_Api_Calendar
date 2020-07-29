<?php
// Api calendar
require_once "quickstart.php";
class Agend
{

    public function all()
    {
        return getDataCalendar();
    }

    public function save($data)
    {
        return addEventCalendar($data);
    }
}
