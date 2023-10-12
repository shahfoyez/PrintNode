<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    function create(){
        // Create a PrintNode client
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.printnode.com/',
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode('P99_3p1FsDOjVu_wv6h2RkDXzqcn3ej8yyQzDIxVH2w'),
            ],
        ]);
        $htmlContent = '<html><body><h1>Sample HTML Content</h1></body></html>'; // Replace with your actual HTML content
        $base64EncodedContent = base64_encode($htmlContent);
        $response = $client->post('/printjobs', [
            'json' => [
                'printerId' => '72714115',
                'title' => 'Receipt for Order #123',
                'contentType' => 'pdf_base64', // Specify the content type (e.g., 'pdf' or 'html')
                'content' => $base64EncodedContent, // Actual content to be printed, properly encoded
                // Additional print job settings
            ],
        ]);
        dd( $response );
    }
}
