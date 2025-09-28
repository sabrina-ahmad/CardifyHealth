<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Laravel HTTP client

class SmsController extends Controller
{

    protected $apiSecret, $device;

    public function __construct()
    {
        $this->apiSecret = env('HAHU_API_SECRET', 'API_SECRET');
        $this->device = env('HAHU_DEVICE', 'DEVICE_SECRET');
    }

    public function getSentMessages()
    {
        $response = Http::get("https://hahu.io/api/get/sms.sent", [
            'secret' => $this->apiSecret,
        ]);

        $result = $response->json();

        // Return JSON response or handle data as needed
        return response()->json($result);
    }

    // public function getReceivedMessages()
    // {
    //     $response = Http::get("https://hahu.io/api/get/sms.received", [
    //         'secret' => $this->apiSecret,
    //     ]);
    //
    //     $result = $response->json();
    //
    //     // Return JSON response or handle data as needed
    //     return response()->json($result);
    // }


    public function getReceivedMessages()
    {
        // Send the request to get the received SMS messages
        $response = Http::get("https://hahu.io/api/get/sms.received", [
            'secret' => $this->apiSecret,
        ]);

        // Check if the response was successful
        if ($response->successful()) {
            // The response is successful, so we can proceed with parsing the messages
            $result = $response->json();



            // Check if the response contains the expected data
            if (isset($result['status']) && $result['status'] == 200) {
                $messages = $result['data'];
                $parsedMessages = [];

                // Loop through each message and extract relevant details
                foreach ($messages as $message) {
                    $parsed = $this->parseMessage($message['message']);
                    if ($parsed) {
                        $parsedMessages[] = $parsed;
                    }
                }

                // Return the parsed messages as a JSON response
                return response()->json([
                    'status' => 200,
                    'message' => 'Transaction details extracted successfully.',
                    'data' => $parsedMessages,
                ]);
            } else {
                // If the status is not 200, return an error
                return response()->json([
                    'status' => $result['status'] ?? 500,
                    'message' => $result['message'] ?? 'An error occurred while fetching SMS data.',
                ]);
            }
        } else {
            // If the HTTP request was not successful, return an error response
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch received SMS messages. Please try again later.',
            ]);
        }
    }

    // Helper function to parse message content



    protected function parseMessage($text)
    {
        $pattern = '/Dear\s+(.*?)\s+You have received ETB\s+([\d.]+)\s+from\s+(.*?)\((\d{4}\*{4}\d{4})\)\s*\d*\s*on\s+(\d{2}\/\d{2}\/\d{4}\s+\d{2}:\d{2}:\d{2})\.\s*Your transaction number is\s+(\w+)\./is';

        if (preg_match($pattern, $text, $matches)) {
            return [
                'amount' => $matches[2],
                'sender' => $matches[3],
                'sender_phone' => $matches[4],
                'transaction_id' => $matches[6],
                'datetime' => $matches[5],
            ];
        } else {
            return null;
        }
    }

    public function getPendingMessages()
    {
        $response = Http::get("https://hahu.io/api/get/sms.pending", [
            'secret' => $this->apiSecret,
        ]);

        $result = $response->json();

        // Return the pending SMS messages as JSON response or handle data as needed
        return response()->json($result);
    }

    public function sendSms()
    {
        $text = "Welcome from Cardify\nuse this linkt to register https:://www.google.com \nplease don't share this link to anyone!";
        $message = [
            "secret" => $this->apiSecret, // your API secret from Hahu
            "mode" => "devices",
            "device" => $this->device,
            "sim" => 1,
            "priority" => 1,
            "phone" => "+251972704599",
            "message" => $text
        ];

        $response = Http::asForm()->post('https://hahu.io/api/send/sms', $message);

        $result = $response->json();

        // Do something with the response
        return response()->json($result);
    }
}
