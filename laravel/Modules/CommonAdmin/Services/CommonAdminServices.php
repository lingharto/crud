<?php

namespace Modules\CommonAdmin\Services;

class CommonAdminServices {

    public function getEntityFields($request)
    {
        $entity = $request->get('entity');
        $entityModel = $request->get('entityModel');

        $classname = "\Modules\\" . ucfirst($entity) . "\\Entities\\" . ucfirst($entityModel);

        return $classname::getFields();

    }

}
