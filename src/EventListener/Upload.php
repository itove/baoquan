<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @version
 * @todo
 */

namespace App\EventListener;

use Vich\UploaderBundle\Event\Event;
use App\Entity\Node;
use App\Entity\Others;
use App\Entity\MediaObject;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class Upload
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onVichUploaderPostUpload(Event $event): void
    {
        $object = $event->getObject();
        
        if ($object instanceof Node) {
        }
        
        if ($object instanceof Others) {
        }
        
        if ($object instanceof MediaObject) {
            $file = $object->file;
            // dump(getcwd());
            // dump($file->getPathname()); // /home/al/w/subao/public/files/media/xxxxxx.jpg
            // dump($file->getPath()); // /home/al/w/subao/public/files/media
            // dump($file->getFilename()); // xxxxx.jpg
            $type = $object->getType();
            if (is_null($type)) {
                $type = 9;
            }
            $dir = match ($type) {
                1 => 'avatar/',
                2 => 'node/',
                3 => 'others/',
                9 => 'media/',
            };
            if ($type === 1) {
                $user = $this->em->getRepository(User::class)->find($object->getEntityId());
                $user->setAvatar('files/' . $dir . $file->getFilename());
                $this->em->flush();
            }
            symlink('../media/' . $file->getFilename(), $file->getPath() . '/../' . $dir . $file->getFilename());
        } else {
            // $file = $object->getImageFile();
        }
    }
}
