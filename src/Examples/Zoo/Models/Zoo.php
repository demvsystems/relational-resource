<?php
declare(strict_types=1);

namespace RelationalResourceFramework\Examples\Zoo\Models;

/**
 * Class Zoo
 * @package RelationalResourceFramework\Examples\Zoo
 */
final class Zoo
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
     * @var Lion[]
     */
    public $lions;
    /**
     * @var Buffalo[]
     */
    public $buffalos;

    /**
     * Zoo constructor.
     *
     * @param int       $id
     * @param string    $name
     * @param Lion[]    $lions
     * @param Buffalo[] $buffalos
     */
    public function __construct(int $id, string $name, array $lions, array $buffalos)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->lions    = $lions;
        $this->buffalos = $buffalos;
    }

}