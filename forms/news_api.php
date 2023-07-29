<?php
function fetch_news_data($apiKey, $category) {
    $apiEndpoint = 'https://newsapi.org/v2/top-headlines';
    $requestUrl = "$apiEndpoint?category=$category&apiKey=$apiKey";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $requestUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    // Set the User-Agent header to identify your application
    curl_setopt($ch, CURLOPT_USERAGENT, 'siagamedika');

    // Execute the API request and get the response
    $response = curl_exec($ch);
    // echo 'API Response: ' . $response;

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Error occurred: ' . curl_error($ch);
        // You can handle the error appropriately, log it, etc.
        return null;
    }

    // Close cURL session
    curl_close($ch);

    // Process the response (assuming the response is in JSON format)
    $newsData = json_decode($response, true);

    // Check if the JSON decoding was successful and the "articles" key exists
    if (json_last_error() !== JSON_ERROR_NONE || !isset($newsData['articles'])) {
        echo 'Error decoding JSON response or missing "articles" key';
        // You can handle the error appropriately, log it, etc.
        return null;
    }

    return $newsData;
}
?>
