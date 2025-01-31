<?php

namespace tests\unit\models;

use app\models\Task;
use Codeception\Test\Unit;

class TaskTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        // Set up code that runs before each test
    }

    protected function _after()
    {
        // Clean up code that runs after each test
    }

    public function testValidation()
    {
        // Test empty model
        $model = new Task();
        $this->assertFalse($model->validate());
        $this->assertTrue($model->hasErrors('title'));
        
        // Test required fields
        $model->title = 'Test Task';
        $this->assertTrue($model->validate());
        
        // Test string length validation
        $model->title = str_repeat('a', 256);
        $this->assertFalse($model->validate());
        $this->assertTrue($model->hasErrors('title'));
    }

    public function testSave()
    {
        $model = new Task([
            'title' => 'Test Task',
            'description' => 'Test Description',
            'status' => 'pending',
            'due_date' => '2025-02-01',
        ]);

        $this->assertTrue($model->save());
        
        // Verify the record exists in database
        $savedTask = Task::findOne(['title' => 'Test Task']);
        $this->assertNotNull($savedTask);
        $this->assertEquals('Test Description', $savedTask->description);
        $this->assertEquals('pending', $savedTask->status);
        $this->assertEquals('2025-02-01', $savedTask->due_date);
    }

    public function testAttributeLabels()
    {
        $model = new Task();
        $labels = $model->attributeLabels();
        
        $this->assertEquals('Title', $labels['title']);
        $this->assertEquals('Description', $labels['description']);
        $this->assertEquals('Status', $labels['status']);
        $this->assertEquals('Due Date', $labels['due_date']);
        $this->assertEquals('Created At', $labels['created_at']);
        $this->assertEquals('Updated At', $labels['updated_at']);
    }

    public function testTableName()
    {
        $this->assertEquals('task', Task::tableName());
    }

    public function testDateValidation()
    {
        $model = new Task([
            'title' => 'Test Task',
            'due_date' => '2025-02-01',
        ]);
        
        $this->assertTrue($model->validate());
        
        $model->due_date = 'invalid-date';
        $this->assertTrue($model->validate(), 'Due date is marked as safe, should accept any value');
    }

    public function testStatusValidation()
    {
        $model = new Task([
            'title' => 'Test Task',
            'status' => 'very_long_status_string_that_should_still_work_because_status_is_text_type'
        ]);
        
        $this->assertTrue($model->validate(), 'Status is string type, should accept any string value');
    }
}