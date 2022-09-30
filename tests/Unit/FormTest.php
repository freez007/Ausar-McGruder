<?php

namespace Tests\Unit;

use Tests\TestCase;

/**
 * Class FormTest
 * @package Tests\Unit
 */
class FormTest extends TestCase
{
    /**
     * @return void
     */
    public function test_screen_can_be_rendered()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_user_can_entred_data_on_form()
    {
        $this->get(route('home'))->assertStatus(200);

        $response = $this->json('POST', route('home'), [
            'firstName' => 'firstName',
            'lastName' => 'lastName',
            'middleName' => 'middleName', // optional
            'dateOfBirth' => '2022-09-30',
        ]);

        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function test_user_can_entred_no_valid_data_on_form()
    {
        $this->get(route('home'))->assertStatus(200);

        $response = $this->json('POST', route('home'), [
            'firstName' => '',
            'lastName' => '',
            'middleName' => 'middleName', // optional
            'dateOfBirth' => '2022/09/30', //
        ]);

        $response->assertStatus(422);
    }

}
