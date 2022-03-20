<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
     */
    public function handleVotes($id, $direction, LoggerInterface $logger)
    {

        $count = rand(0, 1000);
        if ($direction == "up") {
            $logger->info('Voting up!');
            $count += 1;
        }
        elseif ($direction == "down") {
            $logger->info('Voting down!');
            $count -= 1;
        }

        return $this->json(["votes" => $count]);
    }
}