<?php

namespace App\Repositories\News;

use App\Repositories\AbstractRepository;

/**
 * Class NewsRepository
 * @package App\Repositories\News
 */
class NewsRepository extends AbstractRepository
{
    /**
     * @param integer $authorId
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findByAuthor(int $authorId, int $limit = 10, array $orderBy = []): array
    {
        $results = $this->model::where('author_id', $authorId);

        $results = $this->buildOrderBy($results, $orderBy);

        return $this->buildPaginate($results, $orderBy, $limit);
    }

    /**
     * Return news by ID or by Slug
     *
     * @param string $param ID or Slug
     * @return array
     */
    public function findBy(string $param): array
    {
        $query = $this->model::query();

        if (is_numeric($param)) {
            return $query->findOrFail($param)->toArray();
        }

        return $query->where('slug', $param)->get()->toArray();
    }

    /**
     * @param string $param ID or Slug
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        if (is_numeric($param)) {
            $news = $this->model::find($param);
        } else {
            $news = $this->model::where('slug', $param);
        }

        return !!$news?->update($data);
    }

    /**
     * @param string $param ID or SLug
     * @return boolean
     */
    public function deleteBy(string $param): bool
    {
        if (is_numeric($param)) {
            return !!$this->model::destroy($param);
        }

        return !!$this->model::where('slug', $param)->delete();
    }

    /**
     * Delete all news of a specific author
     *
     * @param integer $authorId
     * @return boolean
     */
    public function deleteByAuthor(int $authorId): bool
    {
        return !!$this->model::where('author_id', $authorId)->delete();
    }
}
