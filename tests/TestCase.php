<?php

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{

    protected $seed = true;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    /**
     * Return the default json structure to paginated responses.
     *
     * @param array|null $data
     * @return array
     */
    protected function defaultPaginatedStructure(?array $data = null): array
    {
        $structure = [
            'status_code',
            'data'
        ];

        if (!is_null($data)) {
            $structure['data']['data'] = ['*' => $data];
        }

        return $structure;
    }
}
