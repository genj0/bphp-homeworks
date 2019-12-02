<?php
class BadReq extends Exception{}
class NotFound extends Exception{}
class Router
{
    protected $availableLinks;
    public function __construct($availableLinks) 
    {
        $this->availableLinks = $availableLinks;
    }
    
    public function isAvailablePage($pageName) 
    {       
        if (!in_array($pageName, $_GET)) {
            throw new BadReq('Bad Request');
        }
        
        if (!in_array($pageName, $this->availableLinks)) {
            throw new NotFound('Not Found');
        }
         
        return true;
    }
}