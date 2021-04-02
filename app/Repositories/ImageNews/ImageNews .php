<?php

namespace App\Repositories\ImageNews;

use App\Repositories\AbstractRepository;

/**
 * Class ImageNewsRepository
 * @package App\Repositories\ImageNews
 */
class ImageNewsRepository extends AbstractRepository
{
    /**
     * @param integer $newsId
     * @return array
     */
    public function findByNews(int $newsId): array
    {
        return $this->model::where('news_id', $newsId)->get()->toArray();
    }

    /**
     * Delete all images of a specific news
     *
     * @param integer $newsId
     * @return boolean
     */
    public function deleteByNews(int $newsId): bool
    {
        return !!$this->model::where('news_id', $newsId)->delete();
    }
}
