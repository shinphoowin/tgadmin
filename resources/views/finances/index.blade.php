<x-app-layout title="Finance">
    <x-slot name="header">
        <h1 class="text-xl text-gray-800 leading-tight">
            {{ __('财务记录') }}
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
                                    <a href="{{route('finances.index')}}" class="btn btn-success">首页</a>
                                </li>
                            </ul>
                            <form action="{{route('finances.index')}}" method="GET" class="d-flex">
                                <input name="search" class="form-control me-2" type="search" placeholder="搜索" value="{{request('search')}}" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit" style="width: 100px;">搜索</button>
                            </form>
                        </div>
                    </nav>
                   <table  class="table table-striped table-hover table-borderless">
                        <thead style="background: #5B6977">
                            <tr>
                                <th scope="col">财务编号</th>
                                <th scope="col">进出</th>
                                <th scope="col">金额</th>
                                <th scope="col">投注记录 身份</th>
                                <th scope="col">财务编号</th>
                                <th scope="col">注释</th>
                                <th scope="col">用户名</th>
                                <th scope="col">期号</th>
                                <th scope="col">返奖金额</th>
                                <th scope="col">输赢</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($finances) == 0)
                            <tr>
                                <td colspan="12" class="text-center text-danger">未找到详细信息 ！</td>
                            </tr>
                            @else
                                @foreach($finances as $finance)
                                
                                <tr>
                                    <td>{{$finance->fid}}</td>
                                    <td>
                                        @if($finance->inout== '1')
        
                                            <span class="text-success">充值 </span>
        
                                        @elseif($finance->inout == '0')
        
                                            <span class="text-warning">提现</span>
        
                                        @else
                                            {{-- <span>{{$finance->inout}}</span> --}}
                                            <span></span>

                                        @endif
                                    </td>
                                    <td>{{$finance->amount}}</td>
                                    <td>{{$finance->beid}}</td>
                                    <td>{{$finance->finance_type}}</td>
                                    <td>{{$finance->comment}}</td>
                                    <td>
                                    <?php

                                            $custom_users = App\Models\CustomUser::where('chat_from_id',$finance->user_id)->get();
                                            echo $custom_users[0]->username;
                                    ?>
                                        
                                    </td>
                                    <td>{{$finance->expect}}</td>
                                    <td>{{$finance->refurn_money}}</td>
                                    <td>{{$finance->win_lose}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot style=" background:#5B6977;">
                            <tr>
                                <th scope="col">财务编号</th>
                                <th scope="col">进出</th>
                                <th scope="col">金额</th>
                                <th scope="col">投注记录 身份</th>
                                <th scope="col">财务编号</th>
                                <th scope="col">注释</th>
                                <th scope="col">用户名</th>
                                <th scope="col">期号</th>
                                <th scope="col">返奖金额</th>
                                <th scope="col">输赢</th>
                            </tr>
                           
                        </tfoot>
                   </table>
                   {!! $finances->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
