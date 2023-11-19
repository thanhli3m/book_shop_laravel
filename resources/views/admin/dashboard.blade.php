@extends('template/layoutAmin')

@section('contentadmin')
    <section class="wrapper">
        {{-- <h3><i class="fa fa-angle-right"></i> Basic Table Examples</h3> --}}
        <div class="row">

            <div class="col-md-12">

            </div><!-- /col-md-12 -->

            {{-- <div class="col-md-12 mt"> --}}

            </div><!-- row -->

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover" border="1">
                            <h4><i class="fa fa-angle-right"></i> Các đơn đã xác nhận mua</h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th><i class="fa fa-bullhorn"></i>Tên Sản Phẩm</th>
                                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Người Dùng</th>
                                    <th><i class=" fa fa-money"></i>Tổng Tiền</th>
                                    <th><i class=" fa fa-info"></i>Số Lượng</th>
                                    <th><i class="fa fa-phone"></i> Số Điện Thoại</th>
                                    <th><i class=" fa fa-edit"></i> Địa Chỉ</th>
                                    <th><i class=" fa fa-user"></i>Tác Giả</th>
                                    <th><i class=" fa fa-home"></i>Số Trang</th>
                                    <th><i class=" fa fa-home"></i>Năm Phát Hành</th>
                                    <th><i class=" fa fa-edit"></i>Nhà Phát Hành</th>
                                    <th><i class=" fa fa-edit"></i>Trạng Thái</th>
                                    <th><i class=" fa fa-edit"></i>Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="hidden-phone">{{ $order->book_name }}</td>
                                        <td><a href="">{{ $order->user->name }}</a></td>
                                        <td>
                                            @if ($order->quantity == 0)
                                                {{ number_format($order->book_price) }} VND
                                            @else
                                                {{ number_format($order->book_price * $order->quantity) }} VND
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->quantity == 0)
                                                1
                                            @else
                                                {{ $order->quantity }}
                                            @endif


                                        </td>
                                        <td>{{ $order->user->phone_number }}</td>
                                        <td><span
                                                class="label label-info label-mini">{{ $order->user->user_city . '-' . $order->user->user_district . '-' . $order->user->user_commune . '-' . $order->user->user_village }}</span>
                                        </td>
                                        <td>{{ $order->book_author }}</td>
                                        <td>{{ $order->book_page_number }} Trang</td>
                                        <td>{{ $order->publish_year }}</td>
                                        <td>{{ $order->publishing_company }}</td>
                                        @if ($order->progress == 'wait')
                                            <td><span class="label label-warning label-mini">{{ $order->progress }}</span>
                                            </td>
                                        @else
                                            @if ($order->progress == 'delivering')
                                                <td><span class="label label-info label-mini">{{ $order->progress }}</span>
                                                @else
                                                <td><span
                                                        class="label label-success label-mini">{{ $order->progress }}</span>
                                            @endif
                                        @endif
                                        {{-- <td>
                                                <a href="{{ route('update-status', ['id' => $order->id]) }}"><button
                                                        class="btn btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                            </td> --}}
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-theme dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a
                                                            href="{{ route('update-status', ['id' => $order->id, 'status' => 'wait']) }}">Đợi</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('update-status', ['id' => $order->id, 'status' => 'delivering']) }}">Đang Ship</a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('update-status', ['id' => $order->id, 'status' => 'delivered']) }}">Đã Giao</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    {{-- <li><a href="#">Separated link</a></li> --}}
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->

    </section>
@endsection
