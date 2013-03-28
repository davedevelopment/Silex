<?php

namespace Silex;

use Symfony\Component\Routing\RequestContext as BaseRequestContext;
use Symfony\Component\HttpFoundation\Request;

class RequestContext extends BaseRequestContext
{
    public function fromRequest(Request $request)
    {
        parent::fromRequest($request);

        // Inject the query string into the RequestContext for Symfony versions <= 2.2
        if ($request->server->get('QUERY_STRING') !== '' && !method_exists($this, 'getQueryString')) {
            $this->setParameter('QUERY_STRING', $request->server->get('QUERY_STRING'));
        }
    }
}
