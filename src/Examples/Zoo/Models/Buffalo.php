<?php
declare(strict_types=1);

namespace RelationalResource\Examples\Zoo\Models;

/**
 * Class Buffalo
 * @package RelationalResource\Examples\Zoo
 */
final class Buffalo
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
     * Buffalo constructor.
     *
     * @param int    $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * @param int $id
     *
     * @return null|Buffalo
     */
    public static function findById(int $id): ?self
    {
        if ($id === 1) {
            return new self($id, 'Buffalo 1');
        }

        if ($id === 2) {
            return new self($id, 'Buffalo 2');
        }

        return null;
    }
}
