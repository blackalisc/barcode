<?php
require_once "../r.php";
class func
{
    public function sorgu($f, $w, $u)
    {
        if ($u!="")
            $u = "*";
        if (isset($w))
            $y = "SELECT $u FROM $f";
        else
            $y = "SELECT $u FROM $f where $w";

        $s = mysql_fetch_array(mysql_query($y));
        return $s;
    }
}