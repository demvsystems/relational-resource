<?php
declare(strict_types=1);

namespace RelationalResourceFramework\Examples\Zoo;

use RelationalResourceFramework\Examples\Zoo\Models\Lion;
use RelationalResourceFramework\RelationalResource\ResourceInterface;

/**
 * Class LionResource
 * @package RelationalResourceFramework\Examples\Zoo
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
