<?php

namespace App\Services\ImageNews;

use App\Services\AbstractService;

/**
 * Class ImageNewsService
 * @package App\Services\ImageNews
 */
class ImageNewsService extends AbstractService
{
    /**
     * @param integer $newsId
     * @return array
     */
    public function findByNews(int $newsId): array
    {
        return $this->repository->findByNews($newsId);
    }

    /**
     * Delete all images of a specific news
     *
     * @param integer $newsId
     * @return bool
     */
    public function deleteByNews(int $newsId): bool
    {
        return $this->repository->deleteByNews($newsId);
    }
}
