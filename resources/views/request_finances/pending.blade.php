<x-app-layout title="Pending lIst">
    <x-slot name="header">
        <a href="{{route('request_finances.pending')}}" class="btn btn-warning">待办的 列表</a>
        <a href="{{route('request_finances.finish')}}" class="btn btn-success">结束 列表</a>

        <h1 class=" text-xl text-gray-800 leading-tight mt-3">
            待办的 列表
        </h1>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.flash-message')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="navbar navbar-light mb-1" style="background: #39405A; ">
                        <div class="container-fluid">

                            <form action="{{route('request_finances.pending')}}" method="GET" class="d-flex" style="margin-left:75%;">
                                <input name="search" class="form-control me-2" type="search" placeholder="搜索" value="{{request('search')}}" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" style="width: 100px;">搜索</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table table-striped table-hover table-borderless">
                        <thead style="background: #5B6977">
                            <tr>
                                <th scope="col">机器人财务编号 </th>
                                <th scope="col">进出</th>
                                <th scope="col">金额</th>
                                <th scope="col">财务类型</th>
                                <th scope="col">注释</th>
                                <th scope="col">用户身份</th>
                                <th scope="col">财务发生时间</th>
                                <th scope="col">状态</th>
                                <th scope="col">行动</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pending) == 0)
                                <tr>
                                    <td colspan="12" class="text-center text-danger">未找到详细信息 ！</td>
                                </tr>
                            @else
                                @foreach($pending as $one_pending)
                                <tr>
                                    <td>{{$one_pending->bfid}}</td>
                                    <td>
                                        @if($one_pending->in_out !== 0)
                                        <span class="text-success">充值</span>
                                        @else
                                        <span class="text-warning">提现</span>
                                        @endif
                                    </td>
                                    <td>{{$one_pending->amount}}</td>
                                    <td>{{$one_pending->finance_type}}</td>
                                    <td>{{$one_pending->comment}}</td>
                                    <td>
                                        <?php

                                            $custom_users = App\Models\CustomUser::where('chat_from_id',$one_pending->user_id)->get();
                                            echo $custom_users[0]->username;
                                        ?>
                                    </td>
                                    <td>{{$one_pending->finance_time}}</td>
                                    <td>{{$one_pending->status}}</td>
                                    <td>
                                        @if($one_pending->in_out !== 0)
                                        <a href="{{route('request_finances.charge', $one_pending->bfid)}}" class="btn btn-success" onclick="return confirm('您确定要充值吗?')">证实 充值</a>
                                        @else
                                        <a href="{{route('request_finances.draw', $one_pending->bfid)}}" class="btn btn-warning" onclick="return confirm('您确定要提现吗?')">证实 提现</a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <!-- <tfoot style=" background:#5B6977;">
                            <tr>
                                <th scope="col">机器人财务编号 </th>
                                <th scope="col">进出</th>
                                <th scope="col">金额</th>
                                <th scope="col">财务类型</th>
                                <th scope="col">注释</th>
                                <th scope="col">用户身份</th>
                                <th scope="col">财务发生时间</th>
                                <th scope="col">状态</th>
                                <th scope="col">行动</th>

                            </tr>

                        </tfoot> -->
                    </table>
                    {!! $pending->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
