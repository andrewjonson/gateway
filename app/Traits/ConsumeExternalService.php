<?php
namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeExternalService
{
    /**
     * Send request to any service
     * @param $method
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * @return string
     */
    public function performRequest($method, $requestUrl, $formParams = [])
    {
        $response = Http::withHeaders([
            'X-Authorization' => $this->secret
        ])->$method($this->baseUrl.'/api/'.config('app.version').$requestUrl, $formParams);
        return response($response->json(), $response->status());
    }
}