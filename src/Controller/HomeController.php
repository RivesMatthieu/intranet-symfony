<?php

namespace App\Controller;

use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @var ClientsRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ClientsRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index(ClientsRepository $repository): Response
    {
        $clients = $this->repository->findSeo();
        return $this->render('pages/home.html.twig', [
            'clients'=> $clients
        ]);
    }
}