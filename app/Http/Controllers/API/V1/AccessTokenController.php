<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class AccessTokenController extends Controller
{
    private $sid;
    private $apiKeySid;
    private $apiKeySecret;

    function __construct()
    {
        // Substitute your Twilio Account SID and API Key details
        $this->sid = env('TWILIO_ACCOUNT_SID');
        $this->apiKeySid = env('TWILIO_API_KEY_SID');
        $this->apiKeySecret = env('TWILIO_API_KEY_SECRET');
    }

    public function generateToken()
    {
        $identity = uniqid();

        // Create an Access Token
        $token = new AccessToken(
            $this->sid,
            $this->apiKeySid,
            $this->apiKeySecret,
            3600,
            $identity
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom('cool room');
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }
}
