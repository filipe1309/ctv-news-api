<?php

namespace App\Services\ImageNews;

use InvalidArgumentException;
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

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $this->isImage($data['image']);
        $data['image'] = base64_encode(file_get_contents($data['image']));

        return $this->repository->create($data);
    }

    /**
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        $this->isImage($data['image']);
        $data['image'] = base64_encode(file_get_contents($data['image']));
        return $this->repository->editBy($param, $data);
    }

    /**
     * @param string $file
     * @return boolean
     */
    private function isImage(string $file): bool
    {
        $imageArray = getimagesize($file);
        if (!in_array($imageArray[2], [IMAGETYPE_JPEG, IMAGETYPE_PNG])) {
            throw new InvalidArgumentException('Invalid image type');
        }

        return true;
    }
}
