<?php
/**
 * Created by PhpStorm.
 * User: egordm
 * Date: 22-8-2017
 * Time: 11:49
 */

namespace API\Requests;


use API\Helpers\AppHelper;
use Illuminate\Http\Request;

class ApiRequest extends Request
{
    public function getVersion()
    {
        return $this->get('version', AppHelper::DEFAULT_VERSION);
    }

    public function getBeta()
    {
        return $this->get('beta', false);
    }

    public function getCacheKey($key_identity)
    {
        return $key_identity . '_' . $this->getVersion() . '_' . $this->getBeta();
    }
}