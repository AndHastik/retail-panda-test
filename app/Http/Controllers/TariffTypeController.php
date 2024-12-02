<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTariffTypeRequest;
use App\Interfaces\Repositories\TariffTypeRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TariffTypeController extends Controller
{
    private TariffTypeRepositoryInterface $tariffTypeRepository;

    /**
     * @inheritdoc
     */
    public function __construct(
        TariffTypeRepositoryInterface $tariffTypeRepository
    ) {
        $this->tariffTypeRepository = $tariffTypeRepository;
    }
    /**
     * Display a listing of the Tariffs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->tariffTypeRepository->getAll());
    }
    /**
     * Create new Tariff.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTariffTypeRequest $request): JsonResponse
    {
        return response()->json($this->tariffTypeRepository->create($request->all()), JsonResponse::HTTP_CREATED);
    }
}
