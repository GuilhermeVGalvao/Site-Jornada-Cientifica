<?php

class JWT {

    public static function encode(array $payload, string $hash) {

        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];

        $header = json_encode($header);
        $header = base64_encode($header);
         
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
         
        $signature = hash_hmac('sha256', "$header.$payload", $hash, true);
        $signature = base64_encode($signature);
         
        return "$header.$payload.$signature";

    }

    public static function decode(string $token, string $hash) {

        $part = explode(".", $token);

        if (count($part) !== 3) {
            return false;
        }

        $header = $part[0];
        $payload = $part[1];
        $signature = $part[2];

        $valid = hash_hmac('sha256', "$header.$payload", $hash, true);
        $valid = base64_encode($valid);

        if($signature == $valid) {
            return json_decode(base64_decode($payload));
        }

        return false;
        
    }

}