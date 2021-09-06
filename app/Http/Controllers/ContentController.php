<?php

namespace App\Http\Controllers;

class ContentController extends Controller {

	public function index() {
		$client = new \GuzzleHttp\Client();
		$request = $client->get('https://countriesnow.space/api/v0.1/countries/info?returns=flag,unicodeFlag');
		$response = $request->getBody();
		return $response;
	}

	public function show() {
		$country = explode('-', $_GET['country']);
		$client = new \GuzzleHttp\Client();
		$request = $client->request('POST', 'https://countriesnow.space/api/v0.1/countries/population', [
			'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
			'json' => [
				'country' => implode(' ', $country),
			],
		]);
		$response = $request->getBody();
		return $response;
	}
}
