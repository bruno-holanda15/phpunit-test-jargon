<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    protected TagParser $parser;

    // method that runs before every single test
    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    public function test_it_parses_a_single_tag() 
    {
        //Given - Arrange
        $parser = new TagParser();

        //When - Act
        $result = $parser->parse('money');
        $expected = ['money'];

        //Then - Assert
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_separated_lists_of_tags() 
    {
        $result = $this->parser->parse('money, family , travel');
        $expected = ['money', 'family', 'travel'];

        $this->assertSame($expected, $result);
    } 

    public function test_it_pipe_a_comma_separated_lists_of_tags() 
    {
        $result = $this->parser->parse('money| family | travel');
        $expected = ['money', 'family', 'travel'];

        $this->assertSame($expected, $result);
    }

    public function test_comma_optional()
    {
        $result = $this->parser->parse('money,family,travel');
        $expected = ['money', 'family', 'travel'];

        $this->assertSame($expected, $result);

        $result = $this->parser->parse('money|family|travel');
        $expected = ['money', 'family', 'travel'];

        $this->assertSame($expected, $result);
    }
}