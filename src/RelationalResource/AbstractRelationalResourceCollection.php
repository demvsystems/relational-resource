<?php

namespace RelationalResource\RelationalResource;

use Exception;

/**
 * Class AbstractRelationalResourceCollection
 * @package Business
 */
abstract class AbstractRelationalResourceCollection
{
    /**
     * @var string
     */
    protected $key;
    /**
     * @var ResourceInterface[]
     */
    protected $relationshipMapper;

    /**
     * AbstractRelationalResourceCollection constructor.
     *
     * @param string $key
     */
    protected function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param array $collection
     *
     * @return array
     * @throws Exception
     */
    public function getResponseData(array $collection): array
    {
        $data          = [];
        $relationships = [];

        foreach ($collection as $model) {
            $data[] = $this->toArray($model);

            // Merge relationships
            foreach ($this->getRelationships($model) as $key => $ids) {
                if (is_array($ids)) {
                    $relationships[$key] = array_merge($relationships[$key] ?? [], $ids);
                    continue;
                }

                $relationships[$key][] = $ids;
            }
        }

        // Only allow unique IDs
        foreach ($relationships as $key => $value) {
            $relationships[$key] = $this->fetchRelationship($key, array_unique($value));
        }

        return array_merge($relationships, [$this->key => $data]);
    }

    /**
     * @param string            $key
     * @param ResourceInterface $mapper
     */
    protected function addSupport(string $key, ResourceInterface $mapper): void
    {
        $this->relationshipMapper[$key] = $mapper;
    }

    /**
     * @param string $key
     * @param array  $ids
     *
     * @return array
     * @throws Exception
     */
    protected function fetchRelationship(string $key, array $ids): array
    {
        if (!isset($this->relationshipMapper[$key])) {
            throw new Exception("Mapper does not support the {$key} relationship");
        }

        $mapper = $this->relationshipMapper[$key];

        return array_values(array_map(function ($model) use ($mapper) {
            return $mapper->toArray($model);
        }, $mapper->getModels($ids)));
    }

    /**
     * @param self $model
     *
     * @return array
     */
    abstract protected function toArray($model): array;

    /**
     * @param $model
     *
     * @return array
     */
    abstract protected function getRelationships($model): array;
}
