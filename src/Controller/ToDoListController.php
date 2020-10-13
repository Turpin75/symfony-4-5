<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/todolist", name="to-do-list")
     */
    public function index()
    {
        return $this->render('to_do_list/index.html.twig', [
            'controller_name' => 'ToDoListController',
        ]);
    }

    /**
     * @Route("/create", name="create-task", methods={"POST"})
     */
    public function create()
    {
        exit('Create a new task !');
    }

    /**
    * @Route("/switch-status/{id}", name="switch-status")
    */
    public function switchStatus($id)
    {
        exit("Switch status task $id!");
    }

    /**
     * @Route("/delete/{id}", name="delete-task")
     */
    public function delete($id)
    {
        exit("Switch status task $id!");
    }
}
