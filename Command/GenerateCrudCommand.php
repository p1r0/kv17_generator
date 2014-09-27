<?php
/**
 * User: Tabaré Caorsi <tabare@heapstersoft.com>
 * Date: 9/26/14
 * Time: 11:19 PM
 */

namespace p1r0\GeneratorBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class GenerateCrudCommand extends GenerateDoctrineCrudCommand
{
    protected $generator;

    protected function configure()
    {
        parent::configure();
    }

    protected function getGenerator(BundleInterface $bundle = null)
    {
        if (null === $this->generator) {
            $kernel = $this->getContainer()->get('kernel');
            $path = $kernel->locateResource('@SensioGeneratorBundle/Resources/SensioGeneratorBundle/skeleton');
            $directories = array(
                $path
            );

            $this->generator = $this->createGenerator();
            $this->generator->setSkeletonDirs($directories);
        }

        return $this->generator;
    }
}