<?php

namespace Modules\CommonAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonAdmin\Services\CommonAdminServices;

class CommonAdminController extends Controller
{
    protected $commonAdminService;

    function __construct(CommonAdminServices $commonAdminService)
    {
        $this->commonAdminService = $commonAdminService;
    }

    /**
     * Получить поля модели
     *
     * @param $entity
     * @param $mode
     * @return mixed
     */
    public function entityFields(Request $request)
    {
        return $this->commonAdminService->getEntityFields($request);
    }

}
