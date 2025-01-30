<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About - Task Manager';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-about">
    <!-- Main Title Section -->
    <div class="container-fluid bg-light py-4 mb-4">
        <div class="container">
            <h1 class="display-4 mb-3"><?= Html::encode($this->title) ?></h1>
            <p class="lead mb-0">A robust web-based task management application built with Yii2 Basic Template.</p>
        </div>
    </div>

    <div class="container">
        <!-- Features and Tech Stack Section -->
        <div class="row mb-4">
            <!-- Key Features -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0">Key Features</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="h5 font-weight-bold">User Authentication</h3>
                            <ul class="list-unstyled pl-3">
                                <li class="mb-2">✓ Secure registration and login system</li>
                                <li class="mb-2">✓ Password hashing and validation</li>
                                <li class="mb-2">✓ Session management</li>
                                <li class="mb-2">✓ Protected routes</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="h5 font-weight-bold">Task Management</h3>
                            <ul class="list-unstyled pl-3">
                                <li class="mb-2">✓ Create, view, update, and delete tasks</li>
                                <li class="mb-2">✓ Task attributes include title, description, status, and due date</li>
                                <li class="mb-2">✓ Filter tasks by status</li>
                                <li class="mb-2">✓ User-specific task visibility</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technology Stack -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0">Technology Stack</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="h5 font-weight-bold">Backend</h3>
                            <ul class="list-unstyled pl-3">
                                <li class="mb-2">⚙️ Yii2 Framework 2.0</li>
                                <li class="mb-2">⚙️ PHP 7.4+</li>
                                <li class="mb-2">⚙️ MySQL 5.7+</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="h5 font-weight-bold">Frontend</h3>
                            <ul class="list-unstyled pl-3">
                                <li class="mb-2">🎨 Bootstrap 4</li>
                                <li class="mb-2">🎨 jQuery</li>
                                <li class="mb-2">🎨 HTML5/CSS3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Development Team Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0">Development Team</h2>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="p-3">
                                    <div class="mb-3">
                                        <i class="fas fa-user-circle fa-3x text-primary"></i>
                                    </div>
                                    <h3 class="h5 font-weight-bold">Farid Rahimzada</h3>
                                    <p class="text-muted mb-0">Lead Developer</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3">
                                    <div class="mb-3">
                                        <i class="fas fa-user-circle fa-3x text-primary"></i>
                                    </div>
                                    <h3 class="h5 font-weight-bold">Utkirbek Inamjanov</h3>
                                    <p class="text-muted mb-0">Developer | Scrum Master</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="row">
            <div class="col-12 text-center mb-4">
                <p class="mb-3">This project is licensed under the MIT License.</p>
                <?= Html::a('View Project on GitHub', 'https://github.com/Rahimfa/Project-C1.git', [
                    'class' => 'btn btn-primary px-4',
                    'target' => '_blank'
                ]) ?>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerCss("
    .card {
        border: none;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .list-unstyled li {
        position: relative;
        padding-left: 5px;
    }
    .bg-primary {
        background-color: #007bff !important;
    }
    .text-primary {
        color: #007bff !important;
    }
");
?>