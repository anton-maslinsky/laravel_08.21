<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function test_categories_list_show_status()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function test_admin_categories_list_is_view()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertViewIs('admin.news.categories.index');
    }

    public function test_admin_create_categories_status()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function test_admin_dont_see_categories()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertDontSee('Categories');
    }
}
