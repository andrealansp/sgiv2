<?php

namespace SGI;

class Model {

    private $values = [];

    public function setData($data) {

        foreach ($data as $key => $value) {
            $this->$key=$value;
        }
    }
    
    public function __get($name)
    {
        return (isset($this->values[$name]))? $this->values[$name]:NULL;
    }
    
      public function __set($name,$value)
    {
        $this->values[$name] = $value;
    }

    public function getValues() {
        return $this->values;
    }

}

?>
