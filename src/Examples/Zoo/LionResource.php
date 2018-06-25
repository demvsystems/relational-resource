<?php
declare(strict_types=1);

namespace RelationalResource\Examples\Zoo;

use RelationalResource\Examples\Zoo\Models\Lion;
use RelationalResource\RelationalResource\ResourceInterface;

/**
 * Class LionResource
 * @package RelationalResource\Examples\Zoo
 */
final class LionResource implements ResourceInterface
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
            return Lion::findById($id);
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
