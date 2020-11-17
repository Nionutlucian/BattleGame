<?php

namespace Game\Controller\Interfaces;

/**
 * Interface Battable
 * @package Game\Controller\Interfaces
 * This interface is used to force to implement the following methods by the following Battle classes
 */
interface Battable {
    public function play();
    public function populateObjectsProperties();
}