<?php

namespace Tests\Integration;

use TestCase;
use App\Models\Author\Author;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\DatabaseMigrations;

class AuthorTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /**
     * /v1/template [GET]
     * @group Author
     * @return void
     */
    public function testShouldReturnAllAuthors()
    {
        $this->withoutMiddleware()->get("api/v1/authors");
        $this->seeStatusCode(206);
        $this->seeJsonStructure($this->defaultPaginatedStructure(
            ['first_name', 'last_name', 'email', 'genre']
        ));
        //$this->assertDatabaseCount('author', 50);
    }

    /**
     * /api/v1/authors/id [GET]
     * @group Author
     * @return void
     */
    public function testShouldReturnAuthor()
    {
        $objectFake = Author::factory()->create();
        $this->withoutMiddleware()->get("api/v1/authors/{$objectFake->id}");
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['first_name', 'last_name', 'email', 'genre']
        ]);
    }


    /**
     * /v1/template [POST]
     * @group Author
     * @return void
     */
    public function testShouldCreateAuthor()
    {
        $objectFake = Author::factory()->make();
        $this->withoutMiddleware()->post("api/v1/authors", [
            "first_name" => $objectFake->first_name,
            "last_name" => $objectFake->last_name,
            "email" => $objectFake->email,
            "password" => $objectFake->password,
            "genre" => $objectFake->genre,
            "active" => $objectFake->active,
        ]);
        $this->seeStatusCode(201);
        $this->seeInDatabase('author', ['first_name' => $objectFake->first_name]);
    }

    /**
     * /v1/template/id [PUT]
     * @group Author
     * @return void
     */
    public function testShouldUpdateAuthor()
    {
        $objectFake = Author::factory()->create();
        $this->withoutMiddleware()->put("api/v1/authors/{$objectFake->id}", [
            "first_name" => "Bob",
            "last_name" => $objectFake->last_name,
            "email" => $objectFake->email,
            "password" => $objectFake->password,
            "genre" => $objectFake->genre,
            "active" => $objectFake->active,
        ]);
        $this->seeStatusCode(204);
        $this->seeInDatabase('author', ['id' => $objectFake->id, 'first_name' => 'Bob']);
    }

    /**
     * /v1/template/id [DELETE]
     * @group Author
     * @return void
     */
    public function testShouldSoftDeleteAuthor()
    {
        $objectFake = Author::factory()->create();
        $this->withoutMiddleware()->delete("api/v1/authors/{$objectFake->id}");
        $this->seeStatusCode(204);
        $this->notSeeInDatabase('author', [
            'id' => $objectFake->id
        ]);
    }
}
