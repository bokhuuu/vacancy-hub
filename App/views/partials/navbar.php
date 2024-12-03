<?php

use Framework\Session;

?>

<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="/vacancy-hub">Vacancy Hub</a>
        </h1>
        <nav class="space-x-4">
            <?php if (Session::has('user')): ?>
                <div class="flex justify-between items-center gap-4">
                    <div class="text-blue-500">
                        Welcome <?= Session::get('user')['name'] ?>
                    </div>
                    <form method="POST" action="/vacancy-hub/auth/logout">
                        <button type="submit" class="text-white inline hover:underline">Logout</button>
                    </form>
                    <a href="/vacancy-hub/listings/create" class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded hover:shadow-md transition duration-300"><i class="fa fa-edit"></i> Post a Job</a>
                </div>
            <?php else : ?>
                <a href="/vacancy-hub/auth/login" class="text-white hover:underline">Login</a>
                <a href="/vacancy-hub/auth/register" class="text-white hover:underline">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>