<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class ToDoListController extends AbstractController
{
    private $taskRepository;
    private $entityManager;
    
    function __construct(TaskRepository $taskRepository, EntityManagerInterface $entityManager)
    {
        $this->taskRepository = $taskRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/todolist", name="to-do-list")
     */
    public function index()
    {
        $tasks = $this->taskRepository->findBy([], ['id' => 'DESC']);
        
        return $this->render('to_do_list/index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @Route("/create", name="create-task", methods={"POST"})
     */
    public function create(Request $request)
    {   
        $title = trim($request->request->get('title'));

        if(empty($title))
        {
            return $this->redirectToRoute('to-do-list');
        }

        $task = new Task;
        $task->setTitle($title);

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $this->redirectToRoute('to-do-list');
    }

    /**
    * @Route("/switch-status/{id}", name="switch-status")
    */
    public function switchStatus($id)
    {
        $task = $this->taskRepository->find($id);
        $task->setStatus(!$task->getStatus());

        $this->entityManager->flush();

        return $this->redirectToRoute('to-do-list');
    }

    /**
     * @Route("/delete/{id}", name="delete-task")
     */
    public function delete($id)
    {
        exit("Switch status task $id!");
    }
}
