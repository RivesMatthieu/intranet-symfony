<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController {
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
//
//    /**
//     * @Route("/clients", name="client.index")
//     * @return Response
//     */
//    public function index(): Response
//    {
//        $client = $this->repository->findAll();
//        return $this->render('admin/clients.html.twig', [
//            'client' => $client
//        ]);
//    }
}
