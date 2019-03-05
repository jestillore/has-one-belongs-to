<?php

namespace Jestillore\HasOneBelongsTo\Relations;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HasOneBelongsTo extends BelongsToMany
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getResults()
    {
        return $this->query->first();
    }

    /**
     * @param array $models
     * @param Collection $results
     * @param string $relation
     * @return array
     */
    public function match(array $models, Collection $results, $relation)
    {
        $dictionary = $this->buildDictionary($results);

        // Once we have an array dictionary of child objects we can easily match the
        // children back to their parent using the dictionary and the keys on the
        // the parent models. Then we will return the hydrated models back out.
        foreach ($models as $model) {
            if (isset($dictionary[$key = $model->{$this->parentKey}])) {
                $model->setRelation(
                    $relation, $dictionary[$key][0]
                );
            } else {
                $model->setRelation(
                    $relation, null
                );
            }
        }

        return $models;
    }
}
