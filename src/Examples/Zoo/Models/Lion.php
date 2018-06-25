<?php
declare(strict_types=1);

namespace RelationalResource\Examples\Zoo\Models;

/**
 * Class Lion
 * @package RelationalResource\Examples\Zoo
 */
final class Lion
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $age;

    /**
     * Lion constructor.
     *
     * @param int    $id
     * @param string $name
     * @param int    $age
     */
    public function __construct(int $id, string $name, int $age)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->age  = $age;
    }

    /**
     * @param int $id
     *
     * @return null|Buffalo
     */
    public static function findById(int $id): ?self
    {
        if ($id === 1) {
            return new self($id, 'Simba', 3);
        }

        if ($id === 2) {
            return new self($id, 'Nala', 3);
        }
        if ($id === 3) {
            return new self($id, 'Mufasa', 12);
        }

        return null;
    }
}
