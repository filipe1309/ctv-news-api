<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * Interface ControllerInterface
 * @package App\Http\Controllers
 */
interface ControllerInterface
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAll(Request $request): JsonResponse;

    /**
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function findOneBy(Request $request, int $id): JsonResponse;

    /**
     * @param Request $request
     * @param string $param ID or Slug
     * @return JsonResponse
     */
    public function editBy(Request $request, string $param): JsonResponse;

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse;
}
