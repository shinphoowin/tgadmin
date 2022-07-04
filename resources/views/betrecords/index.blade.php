<x-app-layout title="BetRecord">
    <x-slot name="header">
        <h1 class="text-xl text-gray-800 leading-tight">
            {{ __('投注记录') }}
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
                                    <a href="{{route('betrecords.index')}}" class="btn btn-success">首页</a>
                                </li>
                            </ul>
                            <form action="{{route('betrecords.index')}}" method="GET" class="d-flex">
                                <input name="search" class="form-control me-2" type="search" placeholder="搜索" value="{{request('search')}}" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" style="width: 100px;">搜索</button>
                            </form>
                        </div>
                    </nav>
                   <table  class="table table-striped table-hover table-borderless">
                        <thead style="background: #5B6977">
                            <tr>
                                <th scope="col">投注记录 身份</th>
                                <th scope="col">用户身份</th>
                                <th scope="col">投注记录内容</th>
                                <th scope="col">期号</th>
                                <th scope="col"> 洗码量</th>
                                <th scope="col"> 洗码费</th>
                                <th scope="col">投注记录时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($betrecords) == 0)
                            <tr>
                                <td colspan="12" class="text-center text-danger">未找到详细信息 ！</td>
                            </tr>
                            @else
                                @foreach($betrecords as $betrecord)
                                
                                <tr>
                                    <td>{{$betrecord->betid}}</td>
                                    <td>
                                        <?php

                                        $custom_users = App\Models\CustomUser::where('chat_from_id',$betrecord->user_id)->get();
                                        echo $custom_users[0]->username;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $bet_content =$betrecord->bet_content;
                                            $data = json_decode($bet_content, true);
                                            if($data['a']!=0){
                                                
                                                print_r('a'.$data['a'] . "\r\n");
                                            }
                                            if($data['b']!=0){
                                                print_r('b'.$data['b']);
                                            }
                                        ?>
                                    </td>
                                    <td>{{$betrecord->expect}}</td>
                                    <td>{{$betrecord->xima_amount}}</td>
                                    <td>{{$betrecord->xima_fee}}</td>
                                    <td>{{$betrecord->bet_time}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot style=" background:#5B6977;">
                            <tr>
                                <th scope="col">投注记录 身份</th>
                                <th scope="col">用户身份</th>
                                <th scope="col">投注记录内容</th>
                                <th scope="col">期号</th>
                                <th scope="col"> 洗码量</th>
                                <th scope="col"> 洗码费</th>
                                <th scope="col">投注记录时间</th>
                            </tr>
                           
                        </tfoot>
                   </table>
                   {!! $betrecords->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
