<?php
namespace app\models;

class Game
{
    // Private/protected propertylar
    private $name;
    private $type;
    protected $score;

    // Constructor
    public function __construct($name, $type, $score)
    {
        $this->name = $name;
        $this->type = $type;
        $this->score = $score;
    }

    // Getter va setterlar
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        if (!empty($type)) {
            $this->type = $type;
        }
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        if (is_numeric($score) && $score >= 0) {
            $this->score = $score;
        }
    }
}
