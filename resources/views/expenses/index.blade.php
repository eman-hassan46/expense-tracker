<!DOCTYPE html>
<html>

<head>
    <title>Expense Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary mb-3">
                💰 Expense Tracker
            </h1>
            <div class="row mb-4">

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg bg-success text-white">
                        <div class="card-body text-center">
                            <h5>💰 Total Expenses</h5>

                            <h2 class="fw-bold">
                                Rs. {{ number_format($totalAmount, 2) }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-lg bg-primary text-white">
                        <div class="card-body text-center">
                            <h5>📋 Total Records</h5>

                            <h2 class="fw-bold">
                                {{ $expenses->count() }}
                            </h2>
                        </div>
                    </div>
                </div>

            </div>
            <p class="lead text-secondary">
                Track, organize and manage your daily expenses efficiently.
            </p>
        </div>
        @if (session('success'))
            <div class="alert alert-success shadow-sm">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <h5 class="card-title mb-3">🔍 Filter Expenses</h5>

                <form action="/expenses" method="GET" class="row g-3 align-items-end">

                    <div class="col-md-9">
                        <label class="form-label">Category</label>

                        <select name="category" class="form-select">

                            <option value="">All Categories</option>

                            <option value="Food" {{ request('category') == 'Food' ? 'selected' : '' }}>Food</option>

                            <option value="Transport" {{ request('category') == 'Transport' ? 'selected' : '' }}>
                                Transport</option>

                            <option value="Bills" {{ request('category') == 'Bills' ? 'selected' : '' }}>Bills</option>

                            <option value="Shopping" {{ request('category') == 'Shopping' ? 'selected' : '' }}>Shopping
                            </option>

                            <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>Other</option>

                        </select>
                    </div>

                    <div class="col-md-3 d-grid">
                        <button class="btn btn-success">
                            Filter
                        </button>
                    </div>


                </form>
            </div>
        </div>

        <div class="card shadow-sm mb-4">

            <div class="card-body">

                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <h3 class="mb-4">➕ Add New Expense</h3>

                        <form action="/expenses" method="POST">
                            @csrf

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" value="{{ old('amount') }}"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Category</label>

                                    <select name="category" class="form-select">
                                        <option value="">-- Select Category --</option>

                                        <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food
                                        </option>
                                        <option value="Transport"
                                            {{ old('category') == 'Transport' ? 'selected' : '' }}>Transport</option>
                                        <option value="Bills" {{ old('category') == 'Bills' ? 'selected' : '' }}>Bills
                                        </option>
                                        <option value="Shopping" {{ old('category') == 'Shopping' ? 'selected' : '' }}>
                                            Shopping</option>
                                        <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Expense Date</label>

                                    <input type="date" name="expense_date" value="{{ old('expense_date') }}"
                                        class="form-control">
                                </div>

                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg">
                                    Add Expense
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
                <hr>

                <h3 class="mb-3">📋 Expense History</h3>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">

                        <table class="table table-hover align-middle mb-0">
                            <tr class="table-primary text-center">
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>

                            @forelse($expenses as $expense)
                                <tr>
                                    <td class="text-center fw-semibold">
                                        {{ $expense->title }}
                                    </td>
                                    <td class="text-center fw-bold text-success">
                                        Rs. {{ number_format($expense->amount, 2) }}
                                    </td>
                                    <td class="text-center">

                                        @if ($expense->category == 'Food')
                                            <span class="badge bg-success">Food</span>
                                        @elseif($expense->category == 'Transport')
                                            <span class="badge bg-primary">Transport</span>
                                        @elseif($expense->category == 'Bills')
                                            <span class="badge bg-danger">Bills</span>
                                        @elseif($expense->category == 'Shopping')
                                            <span class="badge bg-warning text-dark">Shopping</span>
                                        @else
                                            <span class="badge bg-secondary">Other</span>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($expense->expense_date)->format('d M Y') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="/expenses/{{ $expense->id }}/edit"
                                            class="btn btn-outline-warning btn-sm me-2">Edit</a>

                                        <form action="/expenses/{{ $expense->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this expense?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        No expenses found.
                                    </td>
                                </tr>
                            @endforelse

                        </table>
                    </div>
                </div>
                <div class="alert alert-info mt-4">
                    <strong>Total Amount:</strong>
                    Rs. {{ number_format($totalAmount, 2) }}
                </div>
            </div>
</body>

</html>
