<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class FuncController extends Controller
{
    private $client;
    private $service;

    function contact(Request $req)
    {
        $subject = "$req->name - $req->subject";
        $queryID = str_pad(rand(0, 999999), 10, '0', STR_PAD_LEFT);

        Mail::to($req->email)->send(new ContactMail($subject, $req->phone, $req->msg, $queryID, $req->email));

        return response()->json(['success' => 'Email sent successfully!']);
    }
    function buyProduct($product)
    {
        if($product=='Basic'){
            header("Location: https://docs.google.com/forms/d/e/1FAIpQLScJU-UQjPz7zw2jMrq4ggPBRnkYhew8tVtkK1xSFgwBwukiuA/viewform?usp=pp_url&entry.389451685=Basic");
        }
        elseif($product=='Starter'){
            header("Location: https://docs.google.com/forms/d/e/1FAIpQLScJU-UQjPz7zw2jMrq4ggPBRnkYhew8tVtkK1xSFgwBwukiuA/viewform?usp=pp_url&entry.389451685=Starter");
        }
        elseif($product=='Pro'){
            header("Location: https://docs.google.com/forms/d/e/1FAIpQLScJU-UQjPz7zw2jMrq4ggPBRnkYhew8tVtkK1xSFgwBwukiuA/viewform?usp=pp_url&entry.389451685=Pro");
        }
        exit();
    }
    function subscribe(Request $req)
    {
        $this->client = new Client();
        $this->client->setApplicationName('Google API');
        $this->client->setScopes([Sheets::SPREADSHEETS]);
        $this->client->setAccessType('offline');

        // Path to credentials.json
        $path = '/var/www/vhosts/doyat.in/webcoflow.doyat.in//credentials.json';
        $this->client->setAuthConfig($path);
        $this->service = new Sheets($this->client);

        $newrow = [$req->email];
        $data = [$newrow];

        $valueRange = new ValueRange();
        $valueRange->setValues($data);
        $range = 'subscribe'; // the service will detect the last row of this sheet
        $options = ['valueInputOption' => 'USER_ENTERED'];
        $this->service->spreadsheets_values->append(env('EMAIL_SPREADSHEETID'), $range, $valueRange, $options);
    }
}
