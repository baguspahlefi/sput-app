<table class="table">
  <thead>
    <tr>
        <th>No</th>
        <th class="col text-center">Point Of Meeting</th>
        <th class="col text-center">pic</th>
        <th class="col text-center">DUE</th>
        <th class="col text-center">Status</th>
        <th class="col text-center">Gambar</th>
    </tr>
  </thead>
  <tbody>
@foreach($details as $key => $detail)
    @if($detail->id_meeting_level_1 == $item->id)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td colspan="2">{{$detail->point_of_meeting}}</td>
      <td colspan="2">{{$detail->pic}}</td>
      <td colspan="2">{{$detail->due}}</td>
      <td colspan="2">{{$detail->status}}</td>
      <td>
            @foreach($detail->evidance_level_1 as $gambarTabel)
                @if($loop->first)
                    <img src="{{ Storage::url($gambarTabel->path_gambar) }}" alt="" width="20" class="img-thumbnail">
                @endif
            @endforeach
        </td>
    </tr>
    @endif
@endforeach
  </tbody>
</table>