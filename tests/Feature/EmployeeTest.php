<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the index page returns a successful response.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    /**
     * Test if a new employee can be created.
     *
     * @return void
     */
    public function testCreateEmployee()
    {
        $data = [
            'name' => 'John Doe',
            'position' => 'Manager',
            // Add other required fields
        ];

        $response = $this->post('/admin', $data);

        $response->assertRedirect('/admin'); // Assuming it redirects to the index page after successful creation
        $this->assertDatabaseHas('employees', $data); // Assuming the employees table is used and the data is stored in it
    }

    /**
     * Test if an existing employee can be updated.
     *
     * @return void
     */
    public function testUpdateEmployee()
    {
        $employee = Employee::factory()->create(); // Assuming you have an Employee factory set up

        $data = [
            'name' => 'Updated Name',
            'position' => 'Updated Position',
            // Add other fields to update
        ];

        $response = $this->put('/admin/'.$employee->id, $data);

        $response->assertRedirect('/admin'); // Assuming it redirects to the index page after successful update
        $this->assertDatabaseHas('employees', $data); // Assuming the employees table is used and the data is updated
    }

    /**
     * Test if an employee can be deleted.
     *
     * @return void
     */
    public function testDeleteEmployee()
    {
        $employee = Employee::factory()->create(); // Assuming you have an Employee factory set up

        $response = $this->delete('/admin/'.$employee->id);

        $response->assertRedirect('/admin'); // Assuming it redirects to the index page after successful deletion
        $this->assertDatabaseMissing('employees', ['id' => $employee->id]); // Assuming the employees table is used and the data is deleted
    }
}
