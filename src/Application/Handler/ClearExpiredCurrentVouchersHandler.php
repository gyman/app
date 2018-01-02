<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\ClearExpiredCurrentVouchersCommand;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;

class ClearExpiredCurrentVouchersHandler
{
    public $lastUpdatedData;

    /** @var MemberRepository|MemberRepositoryInterface */
    private $memberRepository;

    /**
     * ClearExpiredCurrentVouchersHandler constructor.
     *
     * @param MemberRepositoryInterface|MemberRepository $memberRepository
     */
    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function handle(ClearExpiredCurrentVouchersCommand $command)
    {
        $membersWithExpiredVouchers = $this->memberRepository->findAllByExpiredCurrentVoucher();

        $members = $this->memberRepository->findBy(['id' => array_column($membersWithExpiredVouchers, 'member_id')]);

        /** @var Member $member */
        foreach ($members as $member) {
            $member->unsetCurrentVoucher();
        }

        $this->memberRepository->save($members);

        $this->lastUpdatedData = $membersWithExpiredVouchers;
    }
}
