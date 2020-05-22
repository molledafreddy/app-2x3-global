<?php declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use App\User;

class UserControllerUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->controller = new UserController;

        $this->requestSearch = new Request(
            [
                'type'          => 'DESC',
                'perPage'       => 10,
                'orderBy'       => 'id',
                'search'        => '',
            ]
        );

    }//end setUp()

     public function testIndexAllValuesSuccess()
    {
        factory(\App\User::class, 10)->create();
        $response = $this->controller->index($this->requestSearch);
        $this->assertEquals(200, $response->getStatusCode());

    }//end testIndexAllValuesSuccess()

    
    public function testIndexAllParametersSearchEmailSuccess()
    {
        factory(\App\User::class, 10)->create();
        $user = User::first();
        
        $this->requestSearch['search'] = $user->email;
        $response = $this->controller->index($this->requestSearch);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($user->email, json_decode($response->getContent())->data->data[0]->email);
        
    }//end testIndexAllParametersSearchEmailSuccess()


    public function testIndexAllParametersSearchUserNameCompanySuccess()
    {
        factory(\App\User::class, 10)->create();

        $user = User::first();
        
        $this->requestSearch['search'] = $user->name;
        $response = $this->controller->index($this->requestSearch);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($user->name, json_decode($response->getContent())->data->data[0]->name);

    }//end testIndexAllParametersSearchUserNameSuccess()

}//end class
