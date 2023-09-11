<?php

namespace Tests\Feature;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class ItemTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    // @test
    public function testListingItemsReturns200()
    {
        $this->withoutExceptionHandling();
        Item::factory()->count(20)->create();
        $this->getJson(route('item.index'))
            ->assertOk()
            ->assertJsonFragment([
                'total' => 20,
            ])
        ;
    }

    // @test
    public function testSavingItemInDB()
    {
        $this->withoutExceptionHandling();
        $itemData = Item::factory()->raw();
        $this->assertDatabaseCount(Item::class, 0);
        $this->postJson(route('item.store'), $itemData)->assertCreated();
        $this->assertDatabaseCount(Item::class, 1);
    }

    // @test
    public function testShowingAnItem()
    {
        $this->withoutExceptionHandling();
        $item = Item::factory()->create();
        $this->getJson(route('item.show', ['item' => $item->id]))
            ->assertOk()
            ->assertJsonFragment(['name' => $item->name])
        ;
    }

    // @test
    public function testViewingItemsStatistics()
    {
        $this->withoutExceptionHandling();
        Item::factory()->count(10)->create(['price' => 5]);
        $this->getJson(route('items.statistics'))
            ->assertOk()
            ->assertJsonFragment([
                'totalPrice' => 50,
                'averagePrice' => 5,
            ])
        ;
    }
}
