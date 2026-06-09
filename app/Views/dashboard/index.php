<?php require '../app/Views/layouts/header.php'; ?>

<?php require '../app/Views/layouts/sidebar.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Dashboard</h2>

    <a href="/wcash/public/report/pdf"
        class="btn btn-primary">

        📄 Export PDF

    </a>

</div>

<!-- Statistik -->
<div class="row">

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h6>Balance</h6>
                <h2>
                    Rp <?= number_format($balance) ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h6>Income</h6>
                <h2 class="text-success">
                    Rp <?= number_format($income) ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <h6>Expense</h6>
                <h2 class="text-danger">
                    Rp <?= number_format($expense) ?>
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card p-3">
            <h6>Expense by Category</h6>

            <div style="height:250px;">
                <canvas id="expenseChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h6>Income by Category</h6>

            <div style="height:250px;">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h6>Income vs Expense</h6>

            <div style="height:250px;">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4">

    <div class="card-body">

        <h5>Recent Transactions</h5>

        <table class="table">

            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($latestTransactions as $trx): ?>

                    <tr>

                        <td>
                            <?= $trx['transaction_date'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($trx['category_name']) ?>
                        </td>

                        <td>

                            <?php if ($trx['type'] == 'income'): ?>

                                <span class="badge bg-success">
                                    Income
                                </span>

                            <?php else: ?>

                                <span class="badge bg-danger">
                                    Expense
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>
                            Rp <?= number_format($trx['amount']) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<script>
    const expenseByCategory =
        <?= json_encode($expenseByCategory ?? []) ?>;

    const incomeByCategory =
        <?= json_encode($incomeByCategory ?? []) ?>;

    const daily = <?= json_encode($daily ?? []) ?>;
</script>

<script>
    // =========================
    // EXPENSE PIE CHART
    // =========================

    const expenseLabels =
        expenseByCategory.map(item => item.category);

    const expenseValues =
        expenseByCategory.map(item => Number(item.total));

    const expenseCanvas =
        document.getElementById('expenseChart');

    if (expenseCanvas && expenseValues.length > 0) {
        new Chart(expenseCanvas, {

            type: 'doughnut',

            data: {

                labels: expenseLabels,

                datasets: [{
                    label: 'Expense',

                    data: expenseValues,

                    backgroundColor: [
                        '#ef4444',
                        '#f97316',
                        '#eab308',
                        '#8b5cf6',
                        '#3b82f6',
                        '#06b6d4',
                        '#14b8a6'
                    ],

                    borderWidth: 2
                }]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        position: 'bottom'
                    }

                }

            }

        });
    }



    // =========================
    // INCOME PIE CHART
    // =========================

    const incomeLabels =
        incomeByCategory.map(item => item.category);

    const incomeValues =
        incomeByCategory.map(item => Number(item.total));

    const incomeCanvas =
        document.getElementById('incomeChart');

    if (incomeCanvas && incomeValues.length > 0) {
        new Chart(incomeCanvas, {

            type: 'doughnut',

            data: {

                labels: incomeLabels,

                datasets: [{

                    label: 'Income',

                    data: incomeValues,

                    backgroundColor: [
                        '#22c55e',
                        '#10b981',
                        '#06b6d4',
                        '#3b82f6',
                        '#8b5cf6',
                        '#14b8a6',
                        '#84cc16'
                    ],

                    borderWidth: 2

                }]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        position: 'bottom'
                    }

                }

            }

        });
    }



    // =========================
    // LINE CHART
    // =========================

    const monthLabels =
        daily.map(item => item.date);

    const incomeMonthly =
        daily.map(item => Number(item.income));

    const expenseMonthly =
        daily.map(item => Number(item.expense));

    const lineCanvas =
        document.getElementById('lineChart');

    if (lineCanvas) {
        new Chart(lineCanvas, {

            type: 'line',

            data: {

                labels: monthLabels,

                datasets: [

                    {
                        label: 'Income',

                        data: incomeMonthly,

                        borderColor: '#22c55e',

                        backgroundColor: '#22c55e',

                        tension: 0.4
                    },

                    {
                        label: 'Expense',

                        data: expenseMonthly,

                        borderColor: '#ef4444',

                        backgroundColor: '#ef4444',

                        tension: 0.4
                    }

                ]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        position: 'bottom'
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true

                    }

                }

            }

        });
    }
</script>

<?php require '../app/Views/layouts/footer.php'; ?>