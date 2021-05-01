<?php

namespace App\Controller\Admin;

use App\Entity\Clients;
use App\Form\ClientsType;
use App\Repository\ClientsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminClientsController extends AbstractController {

    /**
     * @var ClientsRepository
     */
    private $repository;

    /**
     * @var EntityManager
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
    public function index()
    {
        $client = $this->repository->findAll();
        return $this->render('admin/index.html.twig', compact('client'));
    }

    /**
     * @Route( "/clients/{slug}-{id}", name="client.show", requirements={"slug": "[a-z0-9\-]*"})
     */
    public function show($slug, $id): Response
    {
        $client = $this->repository->find($id);
        dump($client);
        $seo = $client->getSeo();
        $sea = $client->getSea();
        $tma = $client->getTma();
        if( $seo == 1 || $sea == 1 || $tma == 1 )
            $actif = true;
        else
            $actif = false;
        return $this->render('admin/show.html.twig', [
            'clients' => $client,
            'actif'   => $actif
        ]);
    }

    /**
     * @return Response
     * @Route("/clients/{id}/edit", name="client.edit", requirements={"slug": "[a-z0-9\-]*"}, methods="GET|POST")
     */
    public function edit(Clients $clients, $id, Request $request)
    {
        $form = $this->createForm(ClientsType::class, $clients);
        $form->handleRequest($request);

        if ($form->isSubmitted() &&  $form->isValid()){
            $this->em->flush();
            $this->addFlash('succes', 'Client modifié avec succès');
            return $this->redirectToRoute('client.index');
        }

        return $this->render('admin/edit.html.twig', [
            'clients' => $clients,
            'form'    => $form->createView()
        ]);
    }

    /**
     * @Route("/clients/nouveau", name="client.new")
     * @throws \Doctrine\ORM\ORMException
     */
    public function new(Request $request)
    {
        $clients = new Clients();
        $form = $this->createForm(ClientsType::class, $clients);
        $form->handleRequest($request);

        if ($form->isSubmitted() &&  $form->isValid()){
            $this->em->persist($clients);
            $this->em->flush();
            $this->addFlash('succes', 'Client créé avec succès');
            return $this->redirectToRoute('client.index');
        }

        return $this->render('admin/new.html.twig', [
            'clients' => $clients,
            'form'    => $form->createView()
        ]);
    }

    /**
     * @Route("/clients/{id}/edit", name="client.delete", methods="DELETE")
     * @param Clients $clients
     */
    public function delete(Clients $clients, $id)
    {
        $this->em->remove($clients);
        $this->em->flush();
        $this->addFlash('succes', 'Client supprimé avec succès');
        return $this->redirectToRoute('client.index');
    }

}