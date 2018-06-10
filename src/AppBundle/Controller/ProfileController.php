<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{

    public function indexAction(Request $request)
    {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('profile\users.html.twig', array('users' =>   $users));
    }
     /**
     * @Route("/admin/admin", name="testadmin")
     */
    public function adminAction(Request $request)
    {
        return $this->render('Profile/admin.html.twig');
    }

     /**
     * @Route("/user/test", name="testuser")
     */
    public function userAction(Request $request)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('Profile/user.html.twig');
    }
}
