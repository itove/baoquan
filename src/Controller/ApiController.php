<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Wx;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api')]
class ApiController extends AbstractController
{
    private $doctrine;
    private $wx;

    public function __construct(ManagerRegistry $doctrine, Wx $wx)
    {
        $this->doctrine = $doctrine;
        $this->wx = $wx;
    }
    
    #[Route(path: '/api/wxgetphone', name: 'api_wx_getphone', methods: ['POST'])]
    public function wxLogin(Request $request)
    {
        $data = json_decode($request->getContent());
        $code = $data->code;
        $res = $this->wx->getPhoneNumber($code);
        dump($res);
        $resp = $res;
        return $this->json($resp);
    }
}
