<?php

namespace Tests\Unit;


use App\Inspections\Spam;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class SpamTest extends TestCase
{
	use RefreshDatabase;
	/** @test */
	public function it_validates_spam()
	{
		$this->withoutExceptionHandling();
		$spam = new Spam();
		$this->assertFalse($spam->detect('Innocent reply here'));
	}
}