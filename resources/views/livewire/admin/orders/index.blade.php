<div>
    <div class="m-3">
        @include('layouts.inc.admin.flash-message')
    </div>

    <div class="card-body">

        <form wire:submit="filter">
            <div class="row">
                <div class="col-md-3">
                    <label>Filter par date</label>
                    <input wire:model.live="date" type="date" value="{{ date('Y-m-d') }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Filter par Status</label>
                    <select wire:model.live="status" class="form-select">
                        <option value="">Select status</option>
                        <option value="in progress">En cours</option>
                        <option value="completed">Terminé</option>
                        <option value="pending">En attente</option>
                        <option value="cancelled">Annulé</option>
                        <option value="out of stock">Rupture de stock</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <br>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </div>
        </form>

        <div class="table-responsive text-nowrap">
            @if ($orders->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Numéro de suivi</th>
                            <th>Nom du client</th>
                            <th>Total Prix</th>
                            <th>Payment Mode</th>
                            <th>Payment Status</th>
                            <th>Status Message</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-uppercase text-success badge badge-warning">{{ $order->tracking_no }}
                                </td>
                                <td>{{ $order->full_name }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->payment_mode }}</td>
                                <td><label
                                        class="badge badge-{{ $order->payment_status === 'Paid' ? 'success' : 'info' }}">{{ $order->payment_status }}</label>
                                </td>
                                <td><label
                                        class="badge badge-{{ $order->status_message === 'completed' ? 'success' : 'warning' }}">{{ $order->status_message }}</label>
                                </td>
                                <td>{{ $order->created_at->format('d D, F Y') }}</td>
                                <td>
                                    <a class="btn btn-sm btn-dark btn-icon-text"
                                        href="{{ route('orders.show', $order->id) }}">Consulter
                                        <i class="mdi mdi-file-check btn-icon-append"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-center">
                    {{ $none }}
                </div>
            @endif
            {{ $orders->links() }}
        </div>
    </div>
</div>
