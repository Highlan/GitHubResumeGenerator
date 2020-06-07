<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserInterface;
use AppBundle\Form\UserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(UserFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();

            return $this->redirectToRoute('resume', ['username' => $user['username']]);
        }
        return $this->render('main/index.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("resume", name="resume")
     */
    public function resumeAction(UserInterface $user)
    {
        return $this->render('/main/resume.html.twig', [
            'username'           => $user->getUsername(),
            'blog'               => $user->getBlog(),
            'repositoriesAmount' => $user->getRepositoriesAmount(),
            'repositories'       => $user->getRepositories(),
            'languages'          => $user->getLanguages()
        ]);
    }
}
