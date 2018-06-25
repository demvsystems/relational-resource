<?php
declare(strict_types=1);

namespace RelationalResourceFramework\Examples\Zoo;

use RelationalResourceFramework\Examples\Zoo\Models\Buffalo;
use RelationalResourceFramework\RelationalResource\ResourceInterface;

/**
 * Class BuffaloResource
 * @package Business\RelationalResource
 */
final class BuffaloResource implements ResourceInterface
{
    /**
     * @param array $ids
     *
     * @return array
     */
    public function getModels(array $ids): array
    {
        // Beispiel: Hier einfach aus der DB holen
        return array_map(function ($id) {
            return Buffalo::findById($id);
        }, $ids);
    }

    /**
     * @param $model
     *
     * @return array
     */
    public function toArray($model): array
    {
        return (array) $model;
    }
}
