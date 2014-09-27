<?php
/**
 * User: Tabaré Caorsi <tabare@heapstersoft.com>
 * Date: 9/26/14
 * Time: 11:19 PM
 */

namespace p1r0\GeneratorBundle\Command;

use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineFormGenerator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class GenerateCrudCommand extends GenerateDoctrineCrudCommand
{
    protected $generator;
    protected $formGenerator;

    protected $tplDirs;

    protected function configure()
    {
        parent::configure();
    }

    protected function getGenerator(BundleInterface $bundle = null)
    {
        if (null === $this->generator) {
            $this->generator = $this->createGenerator();
            $this->generator->setSkeletonDirs($this->getTemplateDirs());
        }

        return $this->generator;
    }

    protected function getFormGenerator($bundle = null)
    {
        if (null === $this->formGenerator) {
            $this->formGenerator = new DoctrineFormGenerator($this->getContainer()->get('filesystem'));
            $this->formGenerator->setSkeletonDirs($this->getTemplateDirs());
        }

        return $this->formGenerator;
    }

    protected function getTemplateDirs()
    {
        if (empty($this->tplDirs)) {
            $kernel = $this->getContainer()->get('kernel');
            $path = $kernel->locateResource('@SensioGeneratorBundle/Resources/SensioGeneratorBundle/skeleton');
            $this->tplDirs = array(
                $path
            );
        }

        return $this->tplDirs;
    }
}