<?php

namespace Laravel\Passport\Http\Controllers;

use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;
use League\OAuth2\Server\AuthorizationServer;
use App\Http\Controllers\UsuariosSistema\UsuariosSistemaController;

class AccessTokenController
{
    use HandlesOAuthErrors;

    /**
     * The authorization server.
     *
     * @var \League\OAuth2\Server\AuthorizationServer
     */
    protected $server;

    /**
     * The token repository instance.
     *
     * @var \Laravel\Passport\TokenRepository
     */
    protected $tokens;

    /**
     * The JWT parser instance.
     *
     * @var \Lcobucci\JWT\Parser
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @param  \League\OAuth2\Server\AuthorizationServer  $server
     * @param  \Laravel\Passport\TokenRepository  $tokens
     * @param  \Lcobucci\JWT\Parser  $jwt
     * @return void
     */
    public function __construct(AuthorizationServer $server,
                                TokenRepository $tokens,
                                JwtParser $jwt)
    {
        $this->jwt = $jwt;
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /**
     * Authorize a client to access the user's account.
     *
     * @param  \Psr\Http\Message\ServerRequestInterface  $request
     * @return \Illuminate\Http\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {
        //print_r($request);
        $datos = $request->getParsedBody();

        if($datos['grant_type'] == "client_credentials")
            return response()->json(['error' => "Metodo no valido", 'code' => 403], 403);
        if(empty($datos['Destino']))
            return response()->json(['error' => "Destino no encontrada", 'code' => 403], 404);

        switch ($datos['Destino']){
            case "Admin":
                $permiso = UsuariosSistemaController::checkPermisoUsuarioAdmin($datos['username']);
                break;
            case "Client":
                $permiso = UsuariosSistemaController::checkPermisoUsuarioClient($datos['username']);
                break;
            case "ClientMovil":
                $permiso = UsuariosSistemaController::checkPermisoUsuarioClientApp($datos['username']);
                break;
            default:
                $permiso = false;
                break;
        }
        if($permiso === true){
            return $this->withErrorHandling(function () use ($request) {
                return $this->convertResponse(
                    $this->server->respondToAccessTokenRequest($request, new Psr7Response)
                );
            });
        }else{
            switch ($permiso){
                case 1:
                    return response()->json(['error' => "Usuario sin permisos", 'code' => 444], 444);
                    break;
                case 2:
                    return response()->json(['error' => "Cuenta de hospital eliminana", 'code' => 444], 444);
                    break;

                case 3:
                    return response()->json(['error' => "Cuenta de hospital suspendida", 'code' => 444], 444);
                    break;
                default:
                    return response()->json(['error' => "Usuario sin permisos", 'code' => 444], 444);
                    break;
            }
        }
    }
}
