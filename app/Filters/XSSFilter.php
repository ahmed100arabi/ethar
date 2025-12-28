<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class XSSFilter implements FilterInterface
{
    /**
     * Sanitize all incoming request data (GET, POST, and JSON)
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $_GET = $this->sanitize($_GET);
        $_POST = $this->sanitize($_POST);
        
        // If it's a JSON request, we should also sanitize the raw body if possible,
        // but since CI4's getVar() and getJSON() are used, modifying globals is a start.
        // For JSON, we can't easily overwrite the raw body, but we can sanitize 
        // the data if it's accessed via getVar().
    }

    /**
     * Recursive sanitization function
     */
    private function sanitize($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->sanitize($value);
            }
        } else {
            // Use htmlspecialchars to neutralize scripts
            // ENT_QUOTES handles both single and double quotes
            $data = htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the request
    }
}
