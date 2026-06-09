<?php
$current = basename($_SERVER['REQUEST_URI']);
?>
<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 sidebar p-3">

            <h3 class="text-white mb-4">
                💰 WCash
            </h3>

            <a href="/wcash/public/dashboard"
                class="<?= str_contains($current, 'dashboard') ? 'active-menu' : '' ?>">
                <i class="fa fa-home"></i> Dashboard
            </a>

            <a href="/wcash/public/transactions"
                class="<?= str_contains($current, 'transactions') ? 'active-menu' : '' ?>">
                <i class="fa fa-wallet"></i> Transactions
            </a>

            <a href="/wcash/public/categories"
                class="<?= str_contains($current, 'categories') ? 'active-menu' : '' ?>">
                <i class="fa fa-tags"></i> Categories
            </a>

            <a href="/wcash/public/logout">
                <i class="fa fa-sign-out-alt"></i>
                Logout
            </a>

        </div>

        <div class="col-md-10 p-4">