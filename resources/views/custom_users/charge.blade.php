<x-app-layout title="Charge">
    <x-slot name="header">
        <h1 class=" text-xl text-gray-800 leading-tight">
            {{ __('充值') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav class="navbar navbar-light mb-1" style="background: #39405A; ">
                        <div class="container-fluid">
                            <ul>
                                <li>
                                    <a href="{{route('custom_users.index')}}" class="btn btn-success">退出</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <form action="{{route('custom_users.chargeupdate',$custom_user->uid)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="balance" class="form-label h4 mt-4">余额  {{$custom_user->balance}}</label>
                        </div>
                        <div class="mb-3">
                            <label for="charge" class="form-label">充值金额</label>
                            <input type="text" class="form-control" id="charge" name="charge" placeholder="输入 金额" value="{{old('charge')}}">
                            <p class="text-danger">{{ $errors->first('text') }}</p>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> 充值</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
