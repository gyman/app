<?php

namespace Dende\MembersBundle\Services\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query;
use Dende\MembersBundle\Entity\Member;
use Dende\MembersBundle\Entity\MemberRepository;

class MemberManager {

    // <editor-fold defaultstate="collapsed" desc="fields">
    /**
     *
     * @var MembersRepository 
     */
    public $repository;

    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="setters and getters">

    public function getRepository() {
        return $this->repository;
    }

    public function setRepository(MemberRepository $repository) {
        $this->repository = $repository;
        return $this;
    }

    // </editor-fold>

    /**
     * Returns array of all members
     * @return array
     */
    public function getMembers() {
        return $this->repository->getMembersQuery()
                ->execute();
    }

    /**
     * Returns member by id
     * @param int $id
     * @return Member
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }
    
}
