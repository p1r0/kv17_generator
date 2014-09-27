<?php

namespace p1r0\GeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class p1r0GeneratorBundle extends Bundle
{
    public function getParent()
    {
        return "SensioGeneratorBundle";
    }

}
