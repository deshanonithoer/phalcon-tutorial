<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller 
{
    public function indexAction()
    {
        
    }

    public function registerAction()
    {
        $user = new Users();

        // Assign the value from the form to $user
        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
            ]
        );

        // Store and check for errors
        $success = $user->save();

        // Passing the result to the view
        $this->view->success = $success;

        if ($success){
            $message = "Thanks for registering!";
        } else {
            $message = "Sorry, the following problems were generated: <br>" . implode('<br>', $user->getMessages());
        }

        // Passing a message to the view
        $this->view->message = $message;
    }
}