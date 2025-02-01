<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'About Task Manager';
?>

<div class="about-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="title-icon">🚀</span>
                Task Manager
                <span class="version-badge">v2.0</span>
            </h1>
            <p class="hero-subtitle">Level up your productivity with our task management system!</p>
            <div class="achievement-banner">
                <span class="achievement-icon">🏆</span>
                <span>Achievement Unlocked: Visiting About Page</span>
            </div>
        </div>
    </div>

    <div class="content-container">
        <!-- Feature Cards -->
        <div class="feature-grid">
            <!-- User Features Card -->
            <div class="feature-card">
                <div class="card-glow"></div>
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h2>User Powers</h2>
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Secure Authentication System</span>
                    </div>
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Encrypted Password Protection</span>
                    </div>
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Smart Session Management</span>
                    </div>
                    <div class="feature-item locked">
                        <span class="lock-icon">🔒</span>
                        <span>Advanced Features (Coming Soon)</span>
                    </div>
                </div>
                <div class="power-meter">
                    <div class="power-fill"></div>
                </div>
            </div>

            <!-- Task Features Card -->
            <div class="feature-card">
                <div class="card-glow"></div>
                <div class="feature-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h2>Task Powers</h2>
                <div class="feature-list">
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Create & Manage Tasks</span>
                    </div>
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Smart Task Organization</span>
                    </div>
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Progress Tracking</span>
                    </div>
                    <div class="feature-item">
                        <span class="checkmark">⚡</span>
                        <span>Task Filtering System</span>
                    </div>
                </div>
                <div class="power-meter">
                    <div class="power-fill"></div>
                </div>
            </div>
        </div>

        <!-- Tech Stack Section -->
        <div class="tech-stack-section">
            <h2 class="section-title">
                <span class="title-icon">⚙️</span>
                Powerhouse Stack
            </h2>
            <div class="tech-grid">
                <div class="tech-card">
                    <div class="tech-icon">🔧</div>
                    <h3>Backend</h3>
                    <ul>
                        <li>Yii2 Framework</li>
                        <li>PHP 7.4+</li>
                        <li>MySQL 5.7+</li>
                    </ul>
                </div>
                <div class="tech-card">
                    <div class="tech-icon">🎨</div>
                    <h3>Frontend</h3>
                    <ul>
                        <li>Bootstrap 4</li>
                        <li>jQuery Magic</li>
                        <li>Modern HTML5/CSS3</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="team-section">
            <h2 class="section-title">
                <span class="title-icon">👥</span>
                Guild Members
            </h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="avatar">
                        <i class="fas fa-user-ninja"></i>
                        <div class="level-badge">Lvl 99</div>
                    </div>
                    <h3>Farid Rahimzada</h3>
                    <p>Lead Developer</p>
                    <div class="skill-tags">
                        <span>Backend Master</span>
                        <span>Code Wizard</span>
                    </div>
                </div>
                <div class="team-card">
                    <div class="avatar">
                        <i class="fas fa-user-astronaut"></i>
                        <div class="level-badge">Lvl 95</div>
                    </div>
                    <h3>Utkirbek Inamjanov</h3>
                    <p>Developer | Scrum Master</p>
                    <div class="skill-tags">
                        <span>Agile Expert</span>
                        <span>Tech Leader</span>
                    </div>
                </div>
                <div class="team-card">
                    <div class="avatar">
                        <i class="fas fa-user-secret"></i>
                        <div class="level-badge">Lvl 90</div>
                    </div>
                    <h3>Chris Mokaya</h3>
                    <p>Frontend Developer</p>
                    <div class="skill-tags">
                        <span>UI Specialist</span>
                        <span>UX Master</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="page-footer">
            <p>This project is powered by the MIT License</p>
            <?= Html::a('<i class="fab fa-github"></i> Join us on GitHub', 'https://github.com/Rahimfa/Project-C1.git', [
                'class' => 'github-button',
                'target' => '_blank'
            ]) ?>
        </div>
    </div>
</div>

<style>
.about-page {
    background: #f8f9fa;
    min-height: 100vh;
    margin-top: 2%;
}

.hero-section {
    background: linear-gradient(135deg, #2b3440 0%, #1a202c 100%);
    padding: 4rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}

.hero-content {
    position: relative;
    z-index: 1;
}

.hero-title {
    color: white;
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.title-icon {
    font-size: 3rem;
}

.version-badge {
    background: #58cc02;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 1rem;
    vertical-align: middle;
}

.hero-subtitle {
    color: #a0aec0;
    font-size: 1.25rem;
    margin-bottom: 2rem;
}

.achievement-banner {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 1rem;
    padding: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    color: white;
    animation: slideIn 0.5s ease-out;
}

.achievement-icon {
    font-size: 1.5rem;
}

.xp-bonus {
    background: #58cc02;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-weight: bold;
}

.content-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.feature-card {
    background: white;
    border-radius: 1.5rem;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.card-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #58cc02, #46a302);
}

.feature-icon {
    width: 64px;
    height: 64px;
    background: #2b3440;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    color: white;
    font-size: 1.5rem;
}

.feature-list {
    margin: 1.5rem 0;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    padding: 0.75rem;
    background: #f8f9fa;
    border-radius: 0.75rem;
    transition: transform 0.2s ease;
}

.feature-item:hover {
    transform: translateX(5px);
}

.feature-item.locked {
    opacity: 0.7;
}

.power-meter {
    height: 6px;
    background: #e5e7eb;
    border-radius: 3px;
    overflow: hidden;
}

.power-fill {
    width: 75%;
    height: 100%;
    background: linear-gradient(90deg, #58cc02, #46a302);
    animation: powerUp 1s ease-out;
}

.tech-stack-section {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2rem;
    font-weight: 800;
    color: #2b3440;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.tech-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.tech-card {
    background: white;
    border-radius: 1.5rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tech-card:hover {
    transform: translateY(-5px);
}

.tech-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.tech-card ul {
    list-style: none;
    padding: 0;
    margin: 1rem 0 0;
}

.tech-card li {
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    background: #f8f9fa;
    border-radius: 0.5rem;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.team-card {
    background: white;
    border-radius: 1.5rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.team-card:hover {
    transform: translateY(-5px);
}

.avatar {
    width: 80px;
    height: 80px;
    background: #2b3440;
    border-radius: 50%;
    margin: 0 auto 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    color: white;
    font-size: 2rem;
}

.level-badge {
    position: absolute;
    bottom: -5px;
    right: -5px;
    background: #58cc02;
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: bold;
}

.skill-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    justify-content: center;
    margin-top: 1rem;
}

.skill-tags span {
    background: #f3f4f6;
    color: #2b3440;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
}

.page-footer {
    text-align: center;
    margin-top: 3rem;
}

.github-button {
    background: #58cc02;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-weight: bold;
    text-decoration: none;
    color: whitesmoke;
}