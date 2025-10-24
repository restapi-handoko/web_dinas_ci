<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Filterauth implements FilterInterface
{
    private $_db;

    function __construct()
    {
        helper(['cookie', 'web', 'array', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $jwt = get_cookie('jwt');
        $token_jwt = getenv('token_jwt.default.key');
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($token_jwt, 'HS256'));
                if ($decoded) {
                    $userId = $decoded->data->id;
                    $level = $decoded->data->level;

                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {
                        var_dump($uri->getSegment(1));
                        die;
                        $uriMain = $uri->getSegment(1);

                        if ($uriMain === "" || $uriMain === "web" || $uriMain === "auth") {
                        } else {
                            $uriMainMenu = $uri->getSegment(2);
                            if ($uriMain == "webadmin" && $uriMainMenu == "home") {
                            } else {
                                if ($uriMain != "webadmin") {
                                    return redirect()->to(base_url('webadmin/home'));
                                }

                                $dataAccess = listHakAksesAllow();
                                if (!$dataAccess) {
                                    return redirect()->to(base_url('webadmin/home'));
                                }

                                if (!(menu_showed_access($dataAccess, $uriMainMenu))) {
                                    return redirect()->to(base_url('webadmin/home'));
                                }

                                $uriMainSubMenu = $uri->getSegment(3);

                                if (!(submenu_showed_access($dataAccess, $uriMainMenu, $uriMainSubMenu))) {
                                    return redirect()->to(base_url('webadmin/notallow'));
                                    // return redirect()->to(base_url('webadmin/home'));
                                }

                                $uriMainSubMenuAksi = $uri->getSegment(4);

                                if (!(access_allowed_new($dataAccess, $uriMainMenu, $uriMainSubMenu, $uriMainSubMenuAksi))) {
                                    if ($uriMainSubMenuAksi == "" || $uriMainSubMenuAksi == "data") {
                                        return redirect()->to(base_url('webadmin/notallow'));
                                    } else {
                                        $response = new \stdClass;
                                        $response->status = 400;
                                        $response->message = "Akses tidak diizinkan.";
                                        return json_encode($response);
                                    }
                                }

                                // if (!(access_allowed($dataAccess, $uriMainMenu, $uriMainSubMenu))) {
                                //     return redirect()->to(base_url('webadmin/notallow'));
                                // }
                            }


                            // if ($level == 1) {
                            //     if ($uriMain != "a") {
                            //         return redirect()->to(base_url('webadmin/home'));
                            //     }
                            // } else if ($level == 2) {
                            //     if ($uriMain != "sp") {
                            //         return redirect()->to(base_url('sp/home'));
                            //     }
                            // } else if ($level == 3) {
                            //     if ($uriMain != "bp") {
                            //         return redirect()->to(base_url('bp/home'));
                            //     }
                            // } else {
                            //     if ($uriMain != "p") {
                            //         return redirect()->to(base_url('p/home'));
                            //     }
                            // }
                        }
                    }
                } else {
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {
                        $uriMain = $uri->getSegment(1);

                        if ($uriMain == "" || $uriMain == "webadmin" || $uriMain == "auth" || $uriMain == "web") {
                        } else {
                            return redirect()->to(base_url('auth'));
                        }
                    }
                }
            } catch (\Exception $e) {
                $uri = current_url(true);
                $totalSegment = $uri->getTotalSegments();
                if ($totalSegment > 0) {

                    $uriMain = $uri->getSegment(1);

                    if ($uriMain == "" || $uriMain == "webadmin" || $uriMain == "auth" || $uriMain == "web") {
                    } else {
                        return redirect()->to(base_url('auth'));
                    }
                }
            }
        } else {
            $uri = current_url(true);
            $totalSegment = $uri->getTotalSegments();
            if ($totalSegment > 0) {

                $uriMain = $uri->getSegment(1);

                if ($uriMain == "auth") {
                } else {
                    return redirect()->to(base_url('auth'));
                }
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $jwt = get_cookie('jwt');
        $token_jwt = getenv('token_jwt.default.key');
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($token_jwt, 'HS256'));
                if ($decoded) {
                    $userId = $decoded->data->id;
                    $level = $decoded->data->level;
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment == 0) {

                        $uriMain = $uri->getSegment(1);
                        if ($uriMain === "" || $uriMain === "webadmin" || $uriMain == "web") {
                        } else {
                            return redirect()->to(base_url('webadmin/home'));
                            // if ($level == 1) {
                            //     return redirect()->to(base_url('webadmin/home'));
                            // } else if ($level == 2) {
                            //     return redirect()->to(base_url('sp/home'));
                            // } else if ($level == 3) {
                            //     return redirect()->to(base_url('bp/home'));
                            // } else {
                            //     return redirect()->to(base_url('p/home'));
                            // }
                        }
                    } else {
                        return redirect()->to(base_url('webadmin/home'));
                        // if ($level == 1) {
                        //     return redirect()->to(base_url('webadmin/home'));
                        // } else if ($level == 2) {
                        //     return redirect()->to(base_url('sp/home'));
                        // } else if ($level == 3) {
                        //     return redirect()->to(base_url('bp/home'));
                        // } else {
                        //     return redirect()->to(base_url('p/home'));
                        // }
                    }
                } else {
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {

                        $uriMain = $uri->getSegment(1);
                        if ($uriMain != 'auth') {
                            return redirect()->to(base_url('auth'));
                        }
                    }
                }
            } catch (\Exception $e) {
                $uri = current_url(true);
                $totalSegment = $uri->getTotalSegments();
                if ($totalSegment > 0) {

                    $uriMain = $uri->getSegment(1);
                    if ($uriMain != 'auth') {
                        return redirect()->to(base_url('auth'));
                    }
                }
            }
        } else {
            $uri = current_url(true);
            $totalSegment = $uri->getTotalSegments();
            if ($totalSegment > 0) {
                $uriMain = $uri->getSegment(1);
                if ($uriMain != 'auth') {
                    return redirect()->to(base_url('auth'));
                }
            }
        }
    }
}
