<?php 

namespace App;

class TagParser
{
    public function parse(string $tag)
    {
        return preg_split('/ ?[,|] ?/',$tag);
    }
}