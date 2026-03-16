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
            <h2>Admin Activity</h2>
            <p>This admin Blade area is separated now so user/admin guards, middleware, charts, and management widgets can be added without reworking the public site layout.</p>
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
