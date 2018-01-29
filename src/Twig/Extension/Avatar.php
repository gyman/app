<?php
namespace Gyman\Twig\Extension;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Domain\Member;
use Gyman\Domain\MemberView;
use Twig_Extension;
use Twig_SimpleFunction;

class Avatar extends Twig_Extension
{
    const NO_PROFILE = '/bundles/gymanapp/images/no-profile.gif';

    /** @var Club */
    protected $club;

    /** @var string */
    private $uploadDirectory;

    /** @var string */
    private $uploadPath;

    /**
     * Avatar constructor.
     * @param Club $club
     * @param string $uploadDirectory
     */
    public function __construct(Club $club = null, string $uploadDirectory, string $uploadPath)
    {
        $this->club = $club;
        $this->uploadDirectory = $uploadDirectory;
        $this->uploadPath = $uploadPath;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('avatar', [$this, 'getAvatarUrl']),
        ];
    }

    /**
     * @param Member|MemberView $member
     * @return string
     */
    public function getAvatarUrl($member): string
    {
        $dir = rtrim($this->uploadDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $path = rtrim($this->uploadPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $foto = null;

        switch(true) {
            case $member instanceof Member:
                $foto = $member->details()->foto()->foto();
                break;
            case $member instanceof MemberView:
                $foto = $member->foto()->foto();
                break;
        }

        dump($foto);

        if($this->club === null || $foto === null) {
            return self::NO_PROFILE;
        }

        $file = $this->club->subdomain()->name() . DIRECTORY_SEPARATOR . $foto;

        if(is_file($dir . $file) && file_exists($dir . $file)) {
            return $path . $file;
        }

        return self::NO_PROFILE;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'avatar_extension';
    }
}