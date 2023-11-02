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

#[AsEntityListener(event: Events::onVichUploaderPostUpload, entity: MediaObject::class)]
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
        dump($event);
        dump($object);
        
        if ($object instanceof Node) {
        }
        
        if ($object instanceof Others) {
        }
        
        if ($object instanceof MediaObject) {
            $file = $object->file;
            $type = $object->getType();
            if (is_null($type)) {
                $type = 9;
            }
            $dir = match ($type) {
                1 => 'avatar',
                2 => 'node',
                3 => 'others',
                9 => 'media',
            };
        } else {
            $file = $object->getImageFile();
        }
    }
}
