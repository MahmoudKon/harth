<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\RankDataTable;
use App\Http\Controllers\BackendController;
use App\Models\Rank;
use App\Http\Services\RankService;
use App\Http\Requests\RankRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;


class RankController extends BackendController
{
    public bool $full_page_ajax  = true;

    public function store(RankRequest $request, RankService $RankService)
    {
        $row = $RankService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.rank')]));
    }

    public function update(RankRequest $request, RankService $RankService, $id)
    {
        $row = $RankService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.rank')]));
    }

    public function model() :Model { return new Rank; }

    public function dataTable() :DataTable { return new RankDataTable; }
}
