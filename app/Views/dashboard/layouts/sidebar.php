<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1) ?? '';
$segment2 = $uri->getSegment(2) ?? '';
?>

<div class="sidebar">
    <h4><i class='bx bxs-dashboard'></i> Admin Panel</h4>

    <a href="/dashboard" class="<?= ($segment1 === 'dashboard' && $segment2 === '') ? 'active' : '' ?>">
        <i class='bx bxs-home'></i> Dashboard
    </a>

    

    <!-- MENU BLOG BARU -->
    <a href="/dashboard/blog" class="<?= ($segment1 === 'blog') ? 'active' : '' ?>">
        <i class='bx bxs-book-content'></i> Blog
    </a>
    <!-- END MENU BLOG -->

    <a href="/users" class="<?= ($segment1 === 'users') ? 'active' : '' ?>">
        <i class='bx bxs-user'></i> Users
    </a>

    

    <!-- MENU TEAM BARU -->
    <a href="/dashboard/team" class="<?= ($segment1 === 'dashboard' && $segment2 === 'team') ? 'active' : '' ?>">
        <i class='bx bxs-group'></i> Team
    </a>
    <!-- END MENU TEAM -->

    
<!-- END MENU SOSMED -->
 <a href="/dashboard/skills" 
   class="<?= ($segment1 === 'dashboard' && $segment2 === 'skills') ? 'active' : '' ?>">
    <i class='bx bxs-star'></i> Skills
</a>


    

    <a href="/logout">
        <i class='bx bxs-log-out'></i> Logout
    </a>
</div>