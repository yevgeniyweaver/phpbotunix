@extends('layouts.app')

@section('title') Blocked Crids @endsection

@section('content')

    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container-fluid">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>Blocked Crids</h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form method="POST" action="">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <button type="submit" id="add_crid" class="btn green">Add Crid</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
