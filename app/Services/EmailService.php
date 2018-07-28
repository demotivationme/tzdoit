<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Services;


use App\Mail\SendMailable;
use GuzzleHttp\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class EmailService {

    const GITHUB_API = 'https://api.github.com/users/[name]/events/public';
    /**
     * @param FormRequest $data
     * @return array
     * @throws \Exception
     */
    public function send(FormRequest $data) {
        $names = explode(',', str_replace(" ", "", $data->names));
        $emails = [];
        foreach ($names as $name) {
            if($email = $this->parse($name)) {
                $emails[] = $email;
            }
        }
        if(!empty($emails)) {
            $weather = $this->weather(request()->ip());
            Mail::to($emails)->send(new SendMailable($data->message, $weather));
        }
        return $emails;
    }

    /**
     * @param $name
     * @return bool
     */
    private function parse($name) {
        $url = str_replace('[name]', $name, self::GITHUB_API);
        $client = new Client();
        $response = trim($client->get($url)->getBody());
        preg_match('/"email": "(.*)"/', $response, $email);
        return ($email)?$email[1]:false;
    }

    /**
     * @param $ip
     * @return string
     */
    private function weather($ip) {
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if ($query && $query['status'] == 'success') {
            $lat = $query['lat'];
            $lon = $query['lon'];
            $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&APPID=" . env('WEATHER_KEY');
            $response = file_get_contents($url);
            return $response;
        } else {
            return "undefined";
        }
    }
}