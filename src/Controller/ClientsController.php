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

    /**
     * @Route("/clients", name="client.index")
     * @return Response
     */
    public function index(): Response
    {
        $client = $this->repository->findSeo();
        dump($client);
        dump($this->repository);
        $this->em->flush();
        return $this->render('admin/clients.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * @Route( "/clients/{slug}-{id}", name="client.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show($slug, $id): Response
    {
        $client = $this->repository->find($id);
        return $this->render('admin/show.html.twig', [
            'clients' => $client
        ]);
    }
}