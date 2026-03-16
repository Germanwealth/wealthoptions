@extends('layouts.dashboard')

@section('content')
    <section class="dashboard-content">
        <div class="dashboard-metrics">
            @foreach($metrics as $metric)
                <div class="dashboard-card">
                    <span>{{ $metric['label'] }}</span>
                    <strong>{{ $metric['value'] }}</strong>
                </div>
            @endforeach
        </div>

        <div class="dashboard-panel">
            <h2>My Submissions</h2>
            <p>This Blade view is ready to be connected to user-specific activity, deposits, withdrawals, or support requests later.</p>
            <div class="table-responsive">
                <table class="table table-striped" id="subsTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tableRows as $row)
                            <tr>
                                <td>{{ $row['date'] }}</td>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['email'] }}</td>
                                <td>{{ $row['message'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
