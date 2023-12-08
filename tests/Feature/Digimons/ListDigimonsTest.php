<?php

namespace Tests\Feature\Digimons;

use Illuminate\Support\Facades\Http;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ListDigimonsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Http::fake([
            '*' => Http::response([
                'content' => [
                    ['id' => 1, 'name' => 'Garummon', 'href' => 'https://digi-api.com/api/v1/digimon/1', 'image' => 'https://digi-api.com/images/digimon/w/Garummon.png'],
                    ['id' => 2, 'name' => 'Craniummon', 'href' => 'https://digi-api.com/api/v1/digimon/2', 'image' => 'https://digi-api.com/images/digimon/w/Craniummon.png'],
                    ['id' => 3, 'name' => 'Holy Angemon', 'href' => 'https://digi-api.com/api/v1/digimon/3', 'image' => 'https://digi-api.com/images/digimon/w/Holy_Angemon.png'],
                ],
                'pageable' => [
                    'currentPage' => 0,
                    'elementsOnPage' => 5,
                    'totalElements' => 3,
                    'totalPages' => 1,
                    'previousPage' => '',
                    'nextPage' => '',
                ],
            ], 200)
        ]);
    }

    private function digimonList(int $pageSize = 20): \Illuminate\Testing\TestResponse
    {
        $uri = route('digimons.index', [
            'page_size' => $pageSize,
        ]);

        return $this->actingAsRandomUser()->get($uri);
    }

    /** @test */
    public function it_can_render_page()
    {
        // Arrange


        // Act
        $response = $this->digimonList(pageSize: 20);

        // Assert
        $response->assertOk();

        $response->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Digimon/Index')
            ->has('digimons')
        );
    }

    /** @test */
    public function it_can_list_my_pokemon()
    {
        // Arrange


        // Act
        $response = $this->digimonList();

        // Assert
        $response->assertOk();

        $response->assertInertia(fn(AssertableInertia $page) => $page
            ->has('digimons.content', 3)
            ->where('digimons.content.0.id', 1)
            ->where('digimons.content.1.id', 2)
            ->where('digimons.content.2.id', 3)
        );
    }
}
