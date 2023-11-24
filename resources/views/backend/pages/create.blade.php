
@extends('backend.layout.template')
@section('style')
    <style>
        .custom-control-label {
        text-transform: capitalize;
    }
    </style>
@endsection
@section('body-content')

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Create</a></li>
                            <li class="breadcrumb-item active">Role</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Create Role</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-12">
                                    <form class="form" action="" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Role Name</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" id="example-text-input">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 my-2 control-label">Permissions</label>
                                            <div class="col-md-9">
                                                <div class="checkbox my-2">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" value="1" id="checkPermissionAll">
                                                        <label class="custom-control-label" for="checkPermissionAll">All</label>
                                                    </div>
                                                </div>
                                                <hr>
                                                @php $i=1; @endphp
                                                @foreach ($permission_groups as $permission_group)
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="checkbox my-2">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" value="{{ $permission_group->name }}"
                                                                 id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                                <label class="custom-control-label" for="{{ $i }}Management">{{ $permission_group->name }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                                        @php
                                                            $permissions = App\Models\User::getpermissionsByGroupName($permission_group->name);
                                                            $j = 1;
                                                        @endphp

                                                        @foreach ($permissions as $permission )
                                                        <div class="checkbox my-2">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" id="checkPermission{{ $permission->id }}">
                                                                <label class="custom-control-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $j++;
                                                        @endphp
                                                        @endforeach
                                                        <br>
                                                    </div>
                                                </div>
                                                @php
                                                    $i++;
                                                @endphp
                                                @endforeach


                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>

                                    </form>
                                </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div><!-- container -->

</div> <!-- Page content Wrapper -->
@endsection

@section('script')
    <script>
        $('#checkPermissionAll').click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked', true);
            }
            else{
                $('input[type=checkbox]').prop('checked', false);
            }

        });

        function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                classCheckBox.prop('checked', true);
            }
            else{
                classCheckBox.prop('checked', false);
            }

            implementAllChecked();
        }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission){
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckbox    = $('#'+groupID);

            if( $('.'+groupClassName+ ' input:checked').length == countTotalPermission ){
                groupIDCheckbox.prop('checked', true);
            }
            else{
                groupIDCheckbox.prop('checked', false);
            }
            implementAllChecked();
        }

        function implementAllChecked(){
            const countPermissions = {{ count($all_permissions) }};
            const countPermissionGroup = {{ count($permission_groups) }};

            if( $('input[type=checkbox]:checked').length >= countPermissions + countPermissionGroup ){
                $('#checkPermissionAll').prop('checked', true);
            }
            else{
                $('#checkPermissionAll').prop('checked', false);
            }
        }
    </script>
@endsection

