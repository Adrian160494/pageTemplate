<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 05.12.2018
 * Time: 21:28
 */

namespace App\Http\Objects;

class Contact {

    protected $receiver;

    protected $subject;

    protected $email;

    protected $description;

    protected $senderName;

    protected $senderSurname;

    public function __construct($receiver,$subject,$email,$description,$senderName,$senderSurname)
    {
        $this->receiver = $receiver;
        $this->subject = $subject;
        $this->email = $email;
        $this->description = $description;
        $this->senderName = $senderName;
        $this->senderSurname = $senderSurname;
    }

    /**
     * @return mixed
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param mixed $receiver
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @return mixed
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @param mixed $senderName
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
    }

    /**
     * @return mixed
     */
    public function getSenderSurname()
    {
        return $this->senderSurname;
    }

    /**
     * @param mixed $senderSurname
     */
    public function setSenderSurname($senderSurname)
    {
        $this->senderSurname = $senderSurname;
    }



}