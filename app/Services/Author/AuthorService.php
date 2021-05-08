<?php

namespace App\Services\Author;

use App\Services\AbstractService;

/**
 * Class AuthorService
 * @package App\Services\Author
 */
class AuthorService extends AbstractService
{
    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        $data['password'] = encrypt($data['password']);
        return $this->repository->create($data);
    }

    /**
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        $data['password'] = encrypt($data['password']);
        return $this->repository->editBy($param, $data);
    }
}
