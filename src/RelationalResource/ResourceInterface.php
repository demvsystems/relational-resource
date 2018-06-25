<?php

namespace RelationalResource\RelationalResource;

/**
 * Interface ResourceInterface
 * @package Business\RelationalResource
 */
interface ResourceInterface
{
    public function getModels(array $ids): array;

    public function toArray($model): array;
}
