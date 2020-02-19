<?php
class Filter
{
    private $colName;
    private $searchValue;

    function __construct($colName, $searchValue)
    {
        $this->searchValue = $searchValue;
        $this->colName = $colName;
    }

    function filter_callback_array($data)
    {
        $result = false;
        if (is_array($this->colName) && is_array($this->searchValue)) {


            $colcount = count($this->colName);
            $valcount = count($this->searchValue);
            if ($colcount == $valcount) {
                for ($i = 0; $i < $colcount; $i++) {
                    $result = (strtolower(trim($data[$this->colName[$i]])) == strtolower(trim($this->searchValue[$i])));
                    if (!$result) {
                        break;
                    }
                }
            }
        }
        return $result;
    }


    function filter_callback($data)
    {

        return (strtolower(trim($data[$this->colName])) == strtolower(trim($this->searchValue)));
    }


    function first_char_callback($data)
    {
        return (strtolower(trim($data[$this->colName]))[0] == strtolower(trim($this->searchValue)));
    }
    
}



                     