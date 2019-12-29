@extends('main_layout')
@section('title','Gym')
@section('page_description','View Members')
@section('dashboard_content')

<div class="container">

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('message') }} </strong>
    </div>
    @endif
    <form action="/update/member" method="post">
            @csrf 

    <div class="card">
        <p style="text-align: center;margin-top: 2%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info"><strong>Member's History</strong></p>
        <div class="card-body">
            <div id="table" class="table-editable">
                <!-- Table Starts here -->
                <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr style="font-size: 12px;">
                            <th class="text-center">Id</th>
                            <th class="text-center">Member Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Contact Number</th>
                            <th class="text-center">Fee Status</th>
                            <th class="text-center">Edit Record</th>
                            <th class="text-center">Remove Record</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td class="pt-3-half">
                                {{$member->id}}
                            </td>
                            <td class="pt-3-half">
                                {{$member->member_name}}
                            </td>
                            <td class="pt-3-half">
                                {{$member->email}}
                            </td>
                            <td class="pt-3-half">
                                {{$member->address}}
                            </td>
                            <td class="pt-3-half">
                                {{$member->cell_phone}}
                            </td>
                            <td class="pt3-half">
                            @if($member->fee_status==0)
                                    {{"Not Paid"}}
                                    @else
                                    {{"Paid"}}
                                    @endif
                            </td>
                            <td class="pt-3-half">
                                <span class="table-view"><button onclick="onEdit('{{$member->id}}')" style="width:100%;" type="button" class="btn btn-info btn-rounded btn-sm my-0" data-toggle="modal" data-target="#myModal">Edit</button></span>
                            </td>
                            <td>
                                <span class="table-remove"><button onclick="onDelete('{{$member->id}}')" type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 <!-- Modal -->

                 <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <p style="margin-left:30%;font-family:Arial, Helvetica, sans-serif;
                font-size: 1.5rem;" class="text-info text-center"><strong>Edit Member's Details</strong></p>

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <hr>
                                </div>
                                <div class="modal-body">

                                    <label class="text-bold" for="memberId"><strong>Member's Id:</strong></label>
                                    <input id="memberId" type="number" name="memberId" class="form-control" readonly>

                                    <label class="text-bold" for="memberName"><strong>Member's Name:</strong></label>
                                    <input id="memberName" type="text" name="memberName" class="form-control" placeholder="Member's Name" required autofocus>

                                    <label class="text-bold" for="memberEmail"><strong>Member's Email:</strong></label>
                                    <input id="memberEmail" type="email" name="memberEmail" class="form-control" placeholder="Member's Email" required autofocus>

                                    <label class="text-bold" for="memberAddress"><strong>Member's Address:</strong></label>
                                    <input id="memberAddress" type="text" name="memberAddress" class="form-control" placeholder="Member's Address" required autofocus>

                                    <label class="text-bold" for="memberContact"><strong>Member's Contact:</strong></label>
                                    <input id="memberContact" type="number" name="memberContact" class="form-control" placeholder="Member's Contact" required autofocus>

                                    <div class="checkbox">
                                        <label class="text-bold" for="memberStatus"><strong>Fee Status:</strong></label>
                                        <br>
                                        <input type="radio" name="memberStatus" value="1"> Paid
                                        <br>
                                        <input type="radio" name="memberStatus" value="0"> Not Paid
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
 <!--modal end-->
                <hr class="bg-info rounded" style="width:100%;height:2px;border:none;color:#333;" size="30">
                <br>

            </div>
            <!-------Receipt Details and Print!--------->


            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-rounded btn-sm float-right">Print Reports</button>
            </div>

            <!-------Receipt Details and Print!--------->
        </div>
    </div>
    <!--Card Ends Here-->
</div>

<!-------TABLE ENDS HERE-------------->
</form>

</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="csrf-token2" content="{{ csrf_token() }}" />

@section('scriptFiles')
<script script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    function onEdit(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //to update data asynchronously without reloading the whole page.
        $.ajax({
            url: "{{route('SelectMemberController.fetch')}}",
            method: "POST",
            data: {
                memberId: id,
                _token: CSRF_TOKEN
            },
            success: function(result) {
                document.getElementById('memberId').value = result.id;

                document.getElementById('memberName').value = result.member_name;

                document.getElementById('memberEmail').value = result.email;

                document.getElementById('memberAddress').value = result.address;

                document.getElementById('memberContact').value = result.cell_phone;

             

            }

        })

    }
</script>
<script>
    
    function onDelete(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token2"]').attr('content');
            $.ajax({
                url: "{{route('DeleteMemberController.delete')}}",
                method: "POST",
                data: {
                    memberId: id,
                    _token: CSRF_TOKEN
                },
                success: function(result) {
                    location.reload();
                 }
    
            })
    
        }
        </script>
    
    

@endsection

@endsection