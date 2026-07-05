<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-lg border-0">

                <div class="card-body">

                    <h2 class="text-center text-primary mb-4">
                        ✏️ Edit Expense
                    </h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/expenses/{{ $expense->id }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Title</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $expense->title) }}"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Amount</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    name="amount"
                                    value="{{ old('amount', $expense->amount) }}"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Category</label>

                                <select name="category" class="form-select">

                                    <option value="Food" {{ $expense->category=='Food' ? 'selected' : '' }}>Food</option>

                                    <option value="Transport" {{ $expense->category=='Transport' ? 'selected' : '' }}>Transport</option>

                                    <option value="Bills" {{ $expense->category=='Bills' ? 'selected' : '' }}>Bills</option>

                                    <option value="Shopping" {{ $expense->category=='Shopping' ? 'selected' : '' }}>Shopping</option>

                                    <option value="Other" {{ $expense->category=='Other' ? 'selected' : '' }}>Other</option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Expense Date</label>

                                <input
                                    type="date"
                                    name="expense_date"
                                    value="{{ old('expense_date', $expense->expense_date) }}"
                                    class="form-control">

                            </div>

                        </div>

                        <div class="d-grid gap-2">

                            <button class="btn btn-primary btn-lg">
                                Update Expense
                            </button>

                            <a href="/expenses" class="btn btn-secondary">
                                Back
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>