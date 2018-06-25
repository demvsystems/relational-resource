<?php
declare(strict_types=1);

namespace RelationalResource\Examples\Zoo;

use RelationalResource\Examples\Zoo\Models\Buffalo;
use RelationalResource\RelationalResource\ResourceInterface;

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
