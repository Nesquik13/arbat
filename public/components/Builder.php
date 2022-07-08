<?php

namespace app\components;

class Builder
{
    private $string;

    public function setName($name)
    {
        $this->string .= $name;
        return $this;
    }

    public function hello()
    {
        $this->string .= 'hello';
        return $this;
    }

    public function write()
    {
        return $this->string;
    }
}