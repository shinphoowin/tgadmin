<x-app-layout title="CustomUser">
    <x-slot name="header">
        <h1 class="text-xl text-gray-800 leading-tight">
            {{ __('用户列表') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-4 lg:px-2" style="max-width: 85rem;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="navbar navbar-light mb-1" style="background: #39405A; ">
                        <div class="container-fluid">
                            <ul>
                                <li>
                                    <a href="" class="btn btn-success">首页</a>
                                </li>
                            </ul>
                            <form action="{{route('custom_users.index')}}" method="GET" class="d-flex">
                                <input name="search" class="form-control me-2" type="search" placeholder="搜索" value="{{request('search')}}" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" style="width: 100px;">搜索</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table table-striped table-hover table-borderless">
                        <thead style="background: #5B6977">
                            <tr>
                                <th scope="col">用户身份</th>
                                <th scope="col">聊天身份</th>
                                <th scope="col"> 姓</th>
                                <th scope="col">名</th>
                                <th scope="col">用户名</th>
                                <th scope="col">机器人</th>
                                <th scope="col">状态</th>
                                <th scope="col">余额</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($custom_users) == 0)
                            <tr>
                                <td colspan="12" class="text-center text-danger">未找到详细信息 ！</td>
                            </tr>
                            @else
                                @foreach($custom_users as $custom_user)

                                <tr>
                                    <td>{{$custom_user->uid}}</td>
                                    <td>{{$custom_user->chat_from_id}}</td>
                                    <td>{{$custom_user->first_name}}</td>
                                    <td>{{$custom_user->last_name}}</td>
                                    <td>{{$custom_user->username}}</td>
                                    <td>{{$custom_user->is_bot}}</td>

                                    <td>
                                        @if($custom_user->enable == 0)
                                        <span class="text-danger">禁用</span>
                                        @else
                                        <span class="text-success">启用</span>

                                        @endif
                                    </td>

                                    <td>{{$custom_user->balance}}</td>
                                    <td>
                                        @if($custom_user->enable == 0)
                                        <a href="{{route('custom_users.status', $custom_user->uid)}}" class="btn btn-info">启用</a>
                                        @else
                                        <a href="{{route('custom_users.status', $custom_user->uid)}}" class="btn btn-danger">禁用 </a>

                                        @endif
                                        <a href="{{route('custom_users.charge',$custom_user->uid)}}" class="btn btn-success">充值 </a>
                                        <a href="{{route('custom_users.withdraw',$custom_user->uid)}}" class="btn btn-warning">提现</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <!-- <tfoot style=" background:#5B6977;">
                            <tr>
                                <th scope="col">用户身份</th>
                                <th scope="col">聊天身份</th>
                                <th scope="col"> 姓</th>
                                <th scope="col">名</th>
                                <th scope="col">用户名</th>
                                <th scope="col">机器人</th>
                                <th scope="col">状态</th>
                                <th scope="col">余额</th>
                                <th scope="col">操作</th>
                            </tr>

                        </tfoot> -->
                    </table>

                    {!! $custom_users->links() !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
