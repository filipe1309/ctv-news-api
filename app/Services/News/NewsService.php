<?php

namespace App\Services\News;

use App\Services\AbstractService;

/**
 * Class NewsService
 * @package App\Services\News
 */
class NewsService extends AbstractService
{
    /**
     * @param integer $authorId
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findByAuthor(int $authorId, int $limit = 10, array $orderBy = []): array
    {
        return $this->repository->findByAuthor($authorId, $limit, $orderBy);
    }

    /**
     * Return news by ID or by Slug
     *
     * @param string $param ID or Slug
     * @return array
     */
    public function findBy(string $param): array
    {
        return $this->repository->findBy($param);
    }

    /**
     * @param string $param ID or SLug
     * @return bool
     */
    public function deleteBy(string $param): bool
    {
        return $this->repository->deleteBy($param);
    }

    /**
     * Delete all news of a specific author
     *
     * @param integer $authorId
     * @return bool
     */
    public function deleteByAuthor(int $authorId): bool
    {
        return $this->repository->deleteByAuthor($authorId);
    }
}
