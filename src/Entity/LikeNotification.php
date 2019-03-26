<?php

namespace App\Entity;

use App\Entity\Notification;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LikeNotificationRepository")
 */
class LikeNotification extends Notification
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MicroPost")
     */
    private $micropost;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $likedBy;
   
    public function getMicropost()
    {
        return $this->micropost;
    }

    public function setMicropost($micropost): void
    {
        $this->micropost = $micropost;
    }

    public function getLikedBy()
    {
        return $this->likedBy;
    }

    public function setLikedBy($likedBy): void
    {
        $this->likedBy = $likedBy;
    }
}