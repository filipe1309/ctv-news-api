<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 * @package  App\Repositories
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->model::create($data)->toArray();
    }

    /**
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findAll(int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::query();

        $results = $this->buildOrderBy($results, $orderBy);

        return $this->buildPaginate($results, $orderBy, $limit);
    }

    /**
     * @param integer $id
     * @return array
     */
    public function findOneBy(int $id): array
    {
        return $this->model::findOrFail($id)->toArray();
    }

    /**
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        $result = $this->model::find($param)
            ->update($data);

        return !!$result;
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return !!$this->model::destroy($id);
    }

    /**
     * @param string $string
     * @param array $searchFields
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function searchBy(string $string, array $searchFields, int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::where($searchFields[0], 'like', "%$string%");

        if (count($searchFields) > 1) {
            foreach ($searchFields as $field) {
                $results->orWhere($field, 'like', "%$string%");
            }
        }

        $results = $this->buildOrderBy($results, $orderBy);

        return $this->buildPaginate($results, $orderBy, $limit, $string);
    }

    /**
     *
     * Example:
     * name DESC, date ASC
     * $orderBy = [ '-name' => 'DESC', 'date' => 'ASC']
     * http://api/v1/author?order_by=-name,date
     *
     * @param Builder $results
     * @param array $orderBy
     * @return Builder
     */
    protected function buildOrderBy(Builder $results, array $orderBy): Builder
    {
        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results;
    }

    /**
     * 
     * Appends = insert into queryStrings into url on pagination
     * http://api/v1/author?order_by=-name,date&limit=12
     * 
     * @param Builder $results
     * @param array $orderBy
     * @param integer $limit
     * @param string $query
     * @return array
     */
    protected function buildPaginate(Builder $results, array $orderBy, int $limit, string $query = null): array
    {
        $appends = [
            'order_by' => implode(',', array_keys($orderBy)),
            'limit' => $limit
        ];
        if (!empty($query)) {
            $appends['q'] = $query;
        }
        return $results->paginate($limit)
            ->appends($appends)
            ->toArray();
    }
}
