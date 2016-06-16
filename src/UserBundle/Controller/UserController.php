<?php

namespace UserBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

use UserBundle\Entity\User;
use UserBundle\Form\UserType;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * User controller.
 *
 */
class UserController extends FOSRestController
{
    /**
     * Lists all User entities.
     *
     */
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        return array('users' => $users);
    }

    /**
     * Lists one User.
     *
     */
    public function getUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);

        return array('user' => $user);
    }

    /**
     * Creates a new User entity.
     * @Rest\View
     */
    public function createUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new \UserBundle\Form\UserType());
        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array
        $form->bind($jsonData);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return array('user' =>  $user);
        }

        return View::create($form, 400);
    }

    /**
     * Edit User
     */
    public function editUserAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);

        $editForm = $this->createForm('UserBundle\Form\UserType', $user);

        $jsonData = json_decode($request->getContent(), true); // "true" to get an associative array

        $editForm->bind($jsonData);
        if ($user) {
            if ($editForm->isValid()) {

                $em->persist($user);
                $em->flush();

                return array('user' => $user);
            } else {
                return View::create($editForm, 400);
            }
        } else {
            throw $this->createNotFoundException('User not found!');
        }
    }

    /**
     * Delete User
     */
    public function deleteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);

        $em->remove($user);
        $em->flush();
    }
}
