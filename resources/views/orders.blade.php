@extends('mainLayout')

@section('title')Заказы@endsection
@section('stylesheets')

@endsection

@section('content')
        <div class="container d-flex flex-column justify-content-between">
            <div class="row mb-2">
                <div class="col-1">
                    <span class="fw-bold">ID</span>
                </div>
                <div class="col-2">
                    <span class="fw-bold">Статус</span>
                </div>
                <div class="col-3">
                    <span class="fw-bold">Email клиента</span>
                </div>
                <div class="col-3">
                    <span class="fw-bold">Партнер</span>
                </div>
                <div class="col-3">
                    <span class="fw-bold">Дата доставки</span>
                </div>
            </div>
            @foreach ($orders as $order)
                <div class="row mb-2">

                    <div class="col-1">
                        <span><a href="{{ route('orders_edit', ['order' => $order->id]) }}">{{ $order->id }}</a></span>
                    </div>
                    <div class="col-2">
                        <span>{{ $order->getStatusLabel() }}</span>
                    </div>
                    <div class="col-3">
                        <span>{{ $order->client_email }}</span>
                    </div>
                    <div class="col-3">
                        <span>{{ $order->partner['name'] }}</span>
                    </div>
                    <div class="col-3">
                        <span>{{ $order->delivery_dt }}</span>
                    </div>
                </div>
            @endforeach
            <div class="row mt-3">
                {{ $orders->links() }}
            </div>
{{--                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Статус</th>
                        <th>Email клиента</th>
                        <th>Партнер</th>
                        <th>Дата доставки</th>
                    </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('orders_edit', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td>
                            {{ $order->getStatusLabel() }}
                        </td>
                        <td>
                            {{ $order->client_email }}
                        </td>
                        <td>
                            {{ $order->partner['name'] }}
                        </td>
                        <td>
                            {{ $order->delivery_dt }}
                        </td>
                    </tr>
                @endforeach
                </table>--}}

        </div>
@endsection

@section('javascripts')

@endsection
