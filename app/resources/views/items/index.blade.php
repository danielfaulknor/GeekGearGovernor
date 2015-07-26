@extends('template')

@section('content')
 <h1>Asset Management</h1>
 <a href="{{url('/items/create')}}" class="btn btn-success">Create Item</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Barcode</th>
         <th>Title</th>
         <th>Description</th>
         <th>Quantity</th>
         <th>Value</th>
         <th>New</th>
         <th>For Sale</th>
         <th>Public</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($items as $item)
         <tr>
             <td>{{ $item->barcode }}</td>
             <td>{{ $item->title }}</td>
             <td>{{ $item->description }}</td>
             <td>{{ $item->quantity }}</td>
             <td>{{ $item->value }}</td>
             <td>{{ $item->new ? 'Yes' : 'No' }}</td>
             <td>{{ $item->sale ? 'Yes' : 'No' }}</td>
             <td>{{ $item->public ? 'Yes' : 'No' }}</td>
             <td><a href="{{url('items',$item->id)}}" class="btn btn-primary">View</a></td>
             <td><a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['items.destroy', $item->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection