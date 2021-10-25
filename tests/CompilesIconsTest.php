<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladePrimeicons\BladePrimeiconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('prime-apple')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><g id="apple"><path d="M16.52,12.46a3.31,3.31,0,0,1,1.78-3,3.85,3.85,0,0,0-3-1.6c-1.27-.1-2.65.74-3.16.74s-1.77-.7-2.73-.7c-2,0-4.11,1.59-4.11,4.76a9,9,0,0,0,.51,2.9C6.25,16.84,7.9,20.05,9.62,20c.9,0,1.54-.64,2.71-.64s1.72.64,2.73.64c1.73,0,3.23-2.95,3.66-4.26a3.54,3.54,0,0,1-2.2-3.28Zm-2-5.87A3.37,3.37,0,0,0,15.35,4a3.79,3.79,0,0,0-2.42,1.25A3.41,3.41,0,0,0,12,7.81,3,3,0,0,0,14.5,6.59Z"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('prime-apple', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><g id="apple"><path d="M16.52,12.46a3.31,3.31,0,0,1,1.78-3,3.85,3.85,0,0,0-3-1.6c-1.27-.1-2.65.74-3.16.74s-1.77-.7-2.73-.7c-2,0-4.11,1.59-4.11,4.76a9,9,0,0,0,.51,2.9C6.25,16.84,7.9,20.05,9.62,20c.9,0,1.54-.64,2.71-.64s1.72.64,2.73.64c1.73,0,3.23-2.95,3.66-4.26a3.54,3.54,0,0,1-2.2-3.28Zm-2-5.87A3.37,3.37,0,0,0,15.35,4a3.79,3.79,0,0,0-2.42,1.25A3.41,3.41,0,0,0,12,7.81,3,3,0,0,0,14.5,6.59Z"/></g></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('prime-apple', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><g id="apple"><path d="M16.52,12.46a3.31,3.31,0,0,1,1.78-3,3.85,3.85,0,0,0-3-1.6c-1.27-.1-2.65.74-3.16.74s-1.77-.7-2.73-.7c-2,0-4.11,1.59-4.11,4.76a9,9,0,0,0,.51,2.9C6.25,16.84,7.9,20.05,9.62,20c.9,0,1.54-.64,2.71-.64s1.72.64,2.73.64c1.73,0,3.23-2.95,3.66-4.26a3.54,3.54,0,0,1-2.2-3.28Zm-2-5.87A3.37,3.37,0,0,0,15.35,4a3.79,3.79,0,0,0-2.42,1.25A3.41,3.41,0,0,0,12,7.81,3,3,0,0,0,14.5,6.59Z"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-prime-icons.class', 'awesome');

        $result = svg('prime-apple')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><g id="apple"><path d="M16.52,12.46a3.31,3.31,0,0,1,1.78-3,3.85,3.85,0,0,0-3-1.6c-1.27-.1-2.65.74-3.16.74s-1.77-.7-2.73-.7c-2,0-4.11,1.59-4.11,4.76a9,9,0,0,0,.51,2.9C6.25,16.84,7.9,20.05,9.62,20c.9,0,1.54-.64,2.71-.64s1.72.64,2.73.64c1.73,0,3.23-2.95,3.66-4.26a3.54,3.54,0,0,1-2.2-3.28Zm-2-5.87A3.37,3.37,0,0,0,15.35,4a3.79,3.79,0,0,0-2.42,1.25A3.41,3.41,0,0,0,12,7.81,3,3,0,0,0,14.5,6.59Z"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-prime-icons.class', 'awesome');

        $result = svg('prime-apple', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><g id="apple"><path d="M16.52,12.46a3.31,3.31,0,0,1,1.78-3,3.85,3.85,0,0,0-3-1.6c-1.27-.1-2.65.74-3.16.74s-1.77-.7-2.73-.7c-2,0-4.11,1.59-4.11,4.76a9,9,0,0,0,.51,2.9C6.25,16.84,7.9,20.05,9.62,20c.9,0,1.54-.64,2.71-.64s1.72.64,2.73.64c1.73,0,3.23-2.95,3.66-4.26a3.54,3.54,0,0,1-2.2-3.28Zm-2-5.87A3.37,3.37,0,0,0,15.35,4a3.79,3.79,0,0,0-2.42,1.25A3.41,3.41,0,0,0,12,7.81,3,3,0,0,0,14.5,6.59Z"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladePrimeiconsServiceProvider::class,
        ];
    }
}
