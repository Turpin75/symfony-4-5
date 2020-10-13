<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

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
    public function create(Request $request, TaskRepository $repoTask, EntityManagerInterface $entityManager)
    {   
        $title = trim($request->request->get('title'));

        if(empty($title))
        {
            return $this->redirectToRoute('to-do-list');
        }

        $task = new Task;
        $task->setTitle($title);

        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute('to-do-list');
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
