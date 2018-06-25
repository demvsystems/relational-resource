<?php
declare(strict_types=1);

namespace RelationalResourceFramework\Examples\Zoo;

use RelationalResourceFramework\RelationalResource\AbstractRelationalResourceCollection;

/**
 * Class TestResourceCollection
 * @package RelationalResourceFramework\Examples\Zoo
 */
final class ZooResourceCollection extends AbstractRelationalResourceCollection
{
    /**
     * ZooResourceCollection constructor.
     */
    public function __construct()
    {
        parent::__construct('zoo');

        $this->addSupport('lions', new LionResource());
        $this->addSupport('buffalos', new BuffaloResource());
    }

    /**
     * @param $model
     *
     * @return array
     */
    protected function toArray($model): array
    {
        return (array) $model;
    }

    /**
     * @param $model
     *
     * @return array
     */
    protected function getRelationships($model): array
    {
        $lionIds    = [];
        $buffaloIds = [];
        foreach ($model->lions as $lion) {
            if (!empty($lion)) {
                $lionIds[] = $lion->id;
            }
        };
        foreach ($model->buffalos as $buffalo) {
            if (!empty($buffalo)) {
                $buffaloIds [] = $buffalo->id;
            }
        };

        return [
            'lions'    => $lionIds,
            'buffalos' => $buffaloIds,
        ];
    }
}
