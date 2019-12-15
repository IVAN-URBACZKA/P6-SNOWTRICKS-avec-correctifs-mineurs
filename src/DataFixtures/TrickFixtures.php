<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $slugify = new Slugify();

        $title = 'my title';

        $slug = $slugify->slugify($title);

        for($i=1; $i<=10 ; $i++)
        {
            $trick = new Trick();
            $trick->setTitle($title)
                  ->setDescription("<p>Description $i</p>")
                  ->setImage("http://placehold.it/350x150")
                  ->setVideo("<embed src='https://www.youtube.com/embed/F9Bo89m2f6g' allowfullscreen='true' width='425' height='344'>")
                  ->setCreatedAt(new \DateTime())
                  ->setSlug($slug);

            $manager->persist($trick);
        }

        $manager->flush();
    }
}
