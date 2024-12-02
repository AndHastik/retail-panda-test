<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComparisonTariffRequest;
use App\Http\Requests\StoreTariffRequest;
use App\Interfaces\Repositories\TariffRepositoryInterface;
use App\Interfaces\Services\TariffServiceInterface;
use Illuminate\Http\JsonResponse;

class TariffController extends Controller
{
    private TariffServiceInterface $tariffService;
    private TariffRepositoryInterface $tariffRepository;

    /**
     * @inheritdoc
     */
    public function __construct(
        TariffServiceInterface $tariffService,
        TariffRepositoryInterface $tariffRepository
    ) {
        $this->tariffService = $tariffService;
        $this->tariffRepository = $tariffRepository;
    }
    /**
     * Display a listing of the Tariffs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->tariffRepository->getAll());
    }
    /**
     * Create new Tariff.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTariffRequest $request): JsonResponse
    {
        return response()->json($this->tariffRepository->create($request->all()), JsonResponse::HTTP_CREATED);
    }
    /**
     * Display a listing of the Tariff comparisons.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function comparison(ComparisonTariffRequest $request): JsonResponse
    {
        $this->tariffService->setConsumption($request->input('consumption'));

        return response()->json($this->tariffService->compareProducts());
    }
}
