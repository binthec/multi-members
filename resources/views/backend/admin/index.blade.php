@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>管理者一覧</h1>
            <small>
                <i class="fa fa-info-circle"></i> 管理者の一覧です。
            </small>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">

                        <div class="box-header with-border text-right">
                            <a class="btn btn-primary" href="{{ route('admin.create') }}">新規登録</a>
                        </div><!-- /.box-header -->

                        <div class="box-body">
                            @if($admins->count() > 0)
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="bg-primary text-center">
                                        <th>管理者名</th>
                                        <th>作成日</th>
                                        <th>最終変更日</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <td class="text-center">{{ $admin->name }}</td>
                                            <td class="text-center">{{ getJaDateTime($admin->created_at) }}</td>
                                            <td class="text-center">{{ getJaDateTime($admin->updated_at) }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">ユーザ名変更</a>
                                                &emsp;
                                                <a href="{{ route('admin.password.edit', $admin->id) }}" class="btn btn-warning">パスワード変更</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                ユーザが存在しません
                            @endif

                        </div><!-- /.box-body -->

                        @if($admins->count() > 0)
                            <div class="box-footer">
                                {{ $admins->links() }}
                            </div>
                        @endif

                    </div><!-- /.box -->

                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </section>

    </div><!-- /.content-wrapper -->
@endsection
